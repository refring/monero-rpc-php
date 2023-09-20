<?php

namespace RefRing\MoneroRpcPhp\Trait;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;

trait EmptyOtherRpcRequest
{
    public static function create(): OtherRpcRequest
    {
        return new self();
    }

    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return "";
    }
}
