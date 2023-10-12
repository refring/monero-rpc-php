<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther\Model;

use RefRing\MoneroRpcPhp\Model\BigInt;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Peer implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * IP address as string
     */
    #[Json]
    public string $host;

    /**
     * Peer id
     */
    #[Json]
    public BigInt $id;

    /**
     * IP address in integer format
     */
    #[Json]
    public int $ip;

    /**
     * unix time at which the peer has been seen for the last time
     */
    #[Json('last_seen')]
    public int $lastSeen;

    /**
     * TCP port the peer is using to connect to monero network.
     */
    #[Json]
    public int $port;

    #[Json('pruning_seed', omit_empty: true)]
    public ?int $pruningSeed;

    /**
     * The credits per hash
     */
    #[Json('rpc_credits_per_hash', omit_empty: true)]
    public ?int $rpcCreditsPerHash;

    /**
     * The port on which the RPC is available
     */
    #[Json('rpc_port', omit_empty: true)]
    public ?int $rpcPort;

    public function __construct(
        string $host,
        BigInt $id,
        int $ip,
        int $port,
        int $lastSeen,
        ?int $rpcPort = null,
        ?int $rpcCreditsPerHash = null,
        ?int $pruningSeed = null,
    ) {
        $this->host = $host;
        $this->id = $id;
        $this->ip = $ip;
        $this->port = $port;
        $this->rpcPort = $rpcPort;
        $this->rpcCreditsPerHash = $rpcCreditsPerHash;
        $this->lastSeen = $lastSeen;
        $this->pruningSeed = $pruningSeed;
    }
}
