<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;

/**
 * Look up one or more transactions by hash.
 */
class GetTransactionsRequest extends OtherRpcRequest
{
    /**
     * @var string[] List of transaction hashes to look up.
     */
    #[Json('txs_hashes')]
    public array $txsHashes;

    /**
     * Optional (`false` by default). If set `true`, the returned transaction information will be decoded rather than binary.
     */
    #[Json('decode_as_json', omit_empty: true)]
    public bool $decodeAsJson = true;

    /**
     * Optional (`false` by default).
     */
    #[Json(omit_empty: true)]
    public ?bool $prune;

    /**
     * Optional (`false` by default).
     */
    #[Json(omit_empty: true)]
    public ?bool $split;

    /**
     * @param string[] $txsHashes
     */
    public static function create(
        array $txsHashes,
        bool $decodeAsJson = true,
        ?bool $prune = null,
        ?bool $split = null,
    ): OtherRpcRequest {
        $self = new self();
        $self->txsHashes = $txsHashes;
        $self->decodeAsJson = $decodeAsJson;
        $self->prune = $prune;
        $self->split = $split;
        return $self;
    }
}
