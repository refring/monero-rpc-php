<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Parse a payment URI to get payment information.
 */
class ParseUriRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * This contains all the payment input information as a properly formatted payment URI
     */
    #[Json]
    public string $uri;


    public static function create(string $uri): RpcRequest
    {
        $self = new self();
        $self->uri = $uri;
        return new RpcRequest('parse_uri', $self);
    }
}
