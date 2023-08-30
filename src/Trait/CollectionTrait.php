<?php

namespace RefRing\MoneroRpcPhp\Trait;

trait CollectionTrait
{
    public array $values;

    public function getIterator() {
        return new \ArrayIterator($this->values);
    }
}
