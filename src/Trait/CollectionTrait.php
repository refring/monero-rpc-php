<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Trait;

trait CollectionTrait
{
    /**
     * @var array<int, mixed>
     */
    public array $values;

    /** @return \ArrayIterator<int, mixed> */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->values);
    }
}
