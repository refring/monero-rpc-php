<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Serialization;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class BigIntPropertyFinder
{
    public const TRAITS_TO_TRAVERSE = [
        JsonSerialize::class,
        JsonSerializeBigInt::class
    ];

    /**
     * @param string[] $classes The classes which are marked as BigInts
     */
    public function __construct(private array $classes)
    {
    }

    /**
     * @param \ReflectionProperty[] $properties
     * @return array{'properties': string[], 'listProperties': string[]}
     */
    public function findProperties(object $instance, array $properties = null): array
    {
        $propertiesToMatch = ['properties' => [], 'listProperties' => []];

        // On the first call we don't expect any properties and use the current instance
        if ($properties === null) {
            $reflect = new \ReflectionClass($instance);
            $properties   = $reflect->getProperties();
        }

        // This function will check if the given object should be traversed based on the presence of certain traits
        $tryToRecurse = function (object $object): array {
            $classUses = class_uses($object);
            if (count(array_intersect($classUses, self::TRAITS_TO_TRAVERSE)) > 0) {
                $reflect = new \ReflectionClass($object);
                $properties   = $reflect->getProperties();
                return $this->findProperties($object, $properties);
            }

            return ['properties' => [], 'listProperties' => []];
        };

        foreach ($properties as $property) {
            // Skip empty properties
            if (!$property->isInitialized($instance) || $property->isPrivate() || $instance->{$property->getName()} === null) {
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

                if (in_array($classType, $this->classes)) {
                    $attributes = $property->getAttributes(Json::class, \ReflectionAttribute::IS_INSTANCEOF);
                    $nameFromAttributes = $this->getPathFromAttributes($attributes);

                    if (!empty($nameFromAttributes)) {
                        $propertiesToMatch['listProperties'][$nameFromAttributes] = true;
                    } else {
                        $propertiesToMatch['listProperties'][$property->getName()] = true;
                    }
                }

                foreach ($instanceProperty as $key => $value) {
                    $propertiesToMatch = array_merge_recursive($propertiesToMatch, $tryToRecurse($value));
                }
                continue;
            }

            if ($type === 'object') {
                $propertiesToMatch = array_merge_recursive($propertiesToMatch, $tryToRecurse($instanceProperty));
            }

            if ($type === 'object' && in_array(get_class($instanceProperty), $this->classes)) {
                // Now lets try to find the 'path' which is the key in the json
                $attributes = $property->getAttributes(Json::class, \ReflectionAttribute::IS_INSTANCEOF);
                $nameFromAttributes = $this->getPathFromAttributes($attributes);

                if (!empty($nameFromAttributes)) {
                    $propertiesToMatch['properties'][$nameFromAttributes] = true;
                } else {
                    $propertiesToMatch['properties'][$property->getName()] = true;
                }
            }
        }

        return $propertiesToMatch;
    }

    /**
     * @param \ReflectionAttribute[] $attributes
     */
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

    /**
     * @param \ReflectionAttribute[] $attributes
     */
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
