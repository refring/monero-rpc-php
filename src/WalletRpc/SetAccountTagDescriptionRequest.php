<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Set description for an account tag.Alias: *None*.
 */
class SetAccountTagDescriptionRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * Set a description for this tag.
     */
    #[Json]
    public string $tag;

    /**
     * Description for the tag.
     */
    #[Json]
    public string $description;


    public static function create(string $tag, string $description): RpcRequest
    {
        $self = new self();
        $self->tag = $tag;
        $self->description = $description;
        return new RpcRequest('set_account_tag_description', $self);
    }
}
