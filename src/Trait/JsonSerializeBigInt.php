<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Trait;

use RefRing\MoneroRpcPhp\Monero\Amount;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

trait JsonSerializeBigInt
{
    use JsonSerialize{
        toJson as toJsonOriginal;
    }
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        $regexFields = $this->recursiveProperties();
        $json = $this->toJsonOriginal($flags, $depth);
        $pattern = $this->buildRegexFromFields($regexFields);


        if (strlen($pattern) > 0) {
            // We want some values to be displayed as integers, php is not able to do this
            // with json_encode and integers larger than PHP_INT_MAX
            $json = (string) preg_replace_callback($pattern, function ($matches) {
                return '"'.$matches[1].'":' . $matches[2];
            }, $json);
        }

        // These are integer values in a list which we want to remove the quotes from
//        $json = (string) preg_replace_callback('/"amount_list":\[(.*?)\]/s', function ($matches) {
//            $amountList = explode(',', $matches[1]);
//            $amountList = str_replace('"', '', $amountList);
//            return '"amount_list":[' . implode(',', $amountList) . ']';
//        }, $json);

        // When params is empty we just strip it
        $json = str_replace(',"params":[]', '', $json);

        return $json;
    }

    private function buildRegexFromFields(array $fields): string
    {
        if (count($fields) > 0) {
            $pattern = '/"(%s)":"(\d+)"/';
            $pattern = sprintf($pattern, implode('|', array_keys($fields)));
            return $pattern;
        }

        return "";
    }

    private function recursiveProperties(array $properties = null, mixed $instance = null): array
    {
        $propertiesToMatch = [];

        // On the first call we don't expect any properties and use the current instance
        if ($properties === null) {
            $reflect = new \ReflectionClass($this);
            $properties   = $reflect->getProperties();
            $instance = $this;
        }

        // This function will check if the given object should be traversed based on the presence of certain traits
        $tryToRecurse = function (object $object): array {
            $classUses = class_uses($object);
            if (array_key_exists(JsonSerialize::class, $classUses) || array_key_exists(JsonSerializeBigInt::class, $classUses)) {
                $reflect = new \ReflectionClass($object);
                $properties   = $reflect->getProperties();
                return $this->recursiveProperties($properties, $object);
            }

            return [];
        };

        foreach ($properties as $property) {
            // Skip empty properties
            if (!$property->isInitialized($instance) || $instance->{$property->getName()} === null) {
                continue;
            }

            $instanceProperty = $instance->{$property->getName()};
            $type = gettype($instanceProperty);

            if ($type === 'array') {
                $attributes = $property->getAttributes(Json::class, \ReflectionAttribute::IS_INSTANCEOF);
                $classType = $this->getClassFromAttributes($attributes);
                if (empty($classType)) {
                    continue;
                }

                foreach ($instanceProperty as $key => $value) {
                    $propertiesToMatch +=  $tryToRecurse($value);
                }
                continue;
            }

            if ($type === 'object') {
                $propertiesToMatch +=  $tryToRecurse($instanceProperty);
            }

            if ($type === 'object' && get_class($instanceProperty) === Amount::class) {
                // Now lets try to find the 'path' which is the key in the json
                $attributes = $property->getAttributes(Json::class, \ReflectionAttribute::IS_INSTANCEOF);
                $nameFromAttributes = $this->getPathFromAttributes($attributes);

                if (!empty($nameFromAttributes)) {
                    $propertiesToMatch[$nameFromAttributes] = true;
                } else {
                    $propertiesToMatch[$property->getName()] = true;
                }
            }
        }

        return $propertiesToMatch;
    }

    private function getPathFromAttributes(array $attributes): string
    {
        foreach ($attributes as $attribute) {
            foreach($attribute->getArguments() as $attrArgumentIndex => $attrArgumentValue) {
                // The path argument we're looking for is the first positional argument
                // When it's supplied as a named argument the key will be 'path'
                if ($attrArgumentIndex === 0 || $attrArgumentIndex === 'path') {
                    return $attrArgumentValue;
                }
            }
        }

        return '';
    }

    private function getClassFromAttributes(array $attributes): string
    {
        foreach ($attributes as $attribute) {
            foreach($attribute->getArguments() as $attrArgumentIndex => $attrArgumentValue) {
                // The type argument we're looking for is the second positional argument
                // When it's supplied as a named argument the key will be 'type'
                if ($attrArgumentIndex === 1 || $attrArgumentIndex === 'type') {
                    return $attrArgumentValue;
                }
            }
        }

        return '';
    }
}
