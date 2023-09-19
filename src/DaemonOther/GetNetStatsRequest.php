<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
 */
class GetNetStatsRequest extends OtherRpcRequest
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
