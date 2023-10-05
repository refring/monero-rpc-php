<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Trait;

use Square\Pjson\JsonSerialize;

trait JsonSerializeBigInt
{
    use JsonSerialize {
        toJson as protected toJsonOriginal;
    }

    use JsonSerialize;

    public function toJson(int $flags = 0, int $depth = 512): string
    {
        $json = $this->toJsonOriginal($flags, $depth);

        // We want some values to be displayed as integers, php is not able to do this
        // with json_encode and integers larger than PHP_INT_MAX
        $pattern = '/"(amount|spent|unspent)":"(\d+)"/';
        $json = (string) preg_replace_callback($pattern, function ($matches) {
            return '"'.$matches[1].'":' . $matches[2];
        }, $json);

        // These are integer values in a list which we want to remove the quotes from
        $json = (string) preg_replace_callback('/"amount_list":\[(.*?)\]/s', function ($matches) {
            $amountList = explode(',', $matches[1]);
            $amountList = str_replace('"', '', $amountList);
            return '"amount_list":[' . implode(',', $amountList) . ']';
        }, $json);

        // When params is empty we just strip it
        $json = str_replace(',"params":[]', '', $json);

        return $json;
    }
}
