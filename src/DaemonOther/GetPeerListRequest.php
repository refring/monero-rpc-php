<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Get the known peers list.
 */
class GetPeerListRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Only show public zone peers
     * When omitted the default value is true
     */
    #[Json('public_only', omit_empty: true)]
    public ?bool $publicOnly;

    /**
     * Show blocked nodes
     * When omitted the default value is false
     */
    #[Json('include_blocked', omit_empty: true)]
    public ?bool $includeBlocked;

    public static function create(?bool $publicOnly = null, ?bool $includeBlocked = null): OtherRpcRequest
    {
        $self = new self();
        $self->publicOnly = $publicOnly;
        $self->includeBlocked = $includeBlocked;
        return $self;
    }

    /**
     * @TODO Move this method into trait or parent class ?
     */
    public function toJson(int $flags = 0, int $depth = 512): string
    {
        $json = parent::toJson($flags, $depth);

        if ($json === '[]') {
            return '';
        }

        return $json;
    }
}
