<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Trait;

use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Serialization\BigIntPropertyFinder;
use Square\Pjson\JsonSerialize;

/**
 * This class replaces certain string values with integer values by removing the quotes in the resulting json
 * This is done because php is not able to do this with json_encode and integers larger than PHP_INT_MAX
 */
trait JsonSerializeBigInt
{
    use JsonSerialize{
        toJson as toJsonOriginal;
    }
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        $json = $this->toJsonOriginal($flags, $depth);

        $json = str_replace(',"params":[]', '', $json, $replaceCount);

        // If we don't have any params it's not necessary to continue here
        if ($replaceCount > 0) {
            return $json;
        }

        $bigIntParser = new BigIntPropertyFinder([Amount::class]);
        $regexFields = $bigIntParser->findProperties($this);

        if (count($regexFields['properties']) > 0) {
            $pattern = $this->buildRegexWithFields($regexFields['properties']);

            $json = (string) preg_replace_callback($pattern, function ($matches) {
                return sprintf('"%s":%s', $matches[1], $matches[2]);
            }, $json);
        }

        if (count($regexFields['listProperties'])) {
            $patternLists = $this->buildListRegexWithFields($regexFields['listProperties']);

            $json = (string) preg_replace_callback($patternLists, function ($matches) {
                $amountList = str_replace('"', '', $matches[2]);
                return sprintf('"%s":[%s]', $matches[1], $amountList);
            }, $json);
        }

        return $json;
    }


    /**
     * @param string[] $fields
     */
    private function buildRegexWithFields(array $fields): string
    {
        if (count($fields) > 0) {
            $pattern = '/"(%s)": ?"(\d+)"/ms';
            $pattern = sprintf($pattern, implode('|', array_keys($fields)));
            return $pattern;
        }

        return "";
    }

    /**
     * @param string[] $fields
     */
    private function buildListRegexWithFields(array $fields): string
    {
        if (count($fields) > 0) {
            $pattern = '/"(%s)":\[(.*?)\]/ms';
            $pattern = sprintf($pattern, implode('|', array_keys($fields)));
            return $pattern;
        }

        return "";
    }
}
