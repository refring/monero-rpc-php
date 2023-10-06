<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Give immediate usability to wallets while syncing by proxying RPC requests.
 */
class SetBootstrapDaemonRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * host:port
     */
    #[Json]
    public string $address;

    #[Json(omit_empty: true)]
    public ?string $username;

    #[Json(omit_empty: true)]
    public ?string $password;

    #[Json(omit_empty: true)]
    public ?string $proxy;

    public static function create(
        string $address,
        ?string $username = null,
        ?string $password = null,
        ?string $proxy = null,
    ): OtherRpcRequest {
        $self = new self();
        $self->address = $address;
        $self->username = $username;
        $self->password = $password;
        $self->proxy = $proxy;
        return $self;
    }
}
