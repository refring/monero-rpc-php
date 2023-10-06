<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Broadcast a raw transaction to the network.
 */
class SendRawTransactionRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Full transaction information as hexidecimal string.
     */
    #[Json('tx_as_hex')]
    public string $txAsHex;

    /**
     * Stop relaying transaction to other nodes
     * When omitted the default value is false
     */
    #[Json('do_not_relay')]
    public ?bool $doNotRelay;

    public static function create(string $txAsHex, ?bool $doNotRelay = null): OtherRpcRequest
    {
        $self = new self();
        $self->txAsHex = $txAsHex;
        $self->doNotRelay = $doNotRelay;
        return $self;
    }
}
