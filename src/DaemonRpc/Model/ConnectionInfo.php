<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class ConnectionInfo implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The peer's address, actually IPv4 & port
     */
    #[Json]
    public string $address;

    #[Json('address_type')]
    public int $addressType;

    /**
     * Average bytes of data downloaded by node.
     */
    #[Json('avg_download')]
    public int $avgDownload;

    /**
     * Average bytes of data uploaded by node.
     */
    #[Json('avg_upload')]
    public int $avgUpload;

    /**
     * The connection ID
     */
    #[Json('connection_id')]
    public string $connectionId;

    /**
     * Current bytes downloaded by node.
     */
    #[Json('current_download')]
    public int $currentDownload;

    /**
     * Current bytes uploaded by node.
     */
    #[Json('current_upload')]
    public int $currentUpload;

    /**
     * The peer height
     */
    #[Json]
    public int $height;

    /**
     * The peer host
     */
    #[Json]
    public string $host;

    /**
     * Is the node getting information from your node?
     */
    #[Json]
    public bool $incoming;

    /**
     * The node's IP address.
     */
    #[Json]
    public string $ip;

    /**
     * unsigned int
     */
    #[Json('live_time')]
    public int $liveTime;

    /**
     * boolean
     */
    #[Json('local_ip')]
    public bool $localIp;

    /**
     * boolean
     */
    #[Json]
    public bool $localhost;

    /**
     * The node's ID on the network.
     */
    #[Json('peer_id')]
    public string $peerId;

    /**
     * The port that the node is using to connect to the network.
     */
    #[Json]
    public string $port;

    #[Json('pruning_seed')]
    public int $pruningSeed;

    /**
     * unsigned int
     */
    #[Json('recv_count')]
    public int $recvCount;

    /**
     * unsigned int
     */
    #[Json('recv_idle_time')]
    public int $recvIdleTime;

    #[Json('rpc_credits_per_hash')]
    public int $rpcCreditsPerHash;

    #[Json('rpc_port')]
    public int $rpcPort;

    /**
     * unsigned int
     */
    #[Json('send_count')]
    public int $sendCount;

    /**
     * unsigned int
     */
    #[Json('send_idle_time')]
    public int $sendIdleTime;

    /**
     * string
     */
    #[Json]
    public string $state;

    /**
     * unsigned int
     */
    #[Json('support_flags')]
    public int $supportFlags;

    public function __construct(
        string $address,
        int $avgDownload,
        int $avgUpload,
        string $connectionId,
        int $currentDownload,
        int $currentUpload,
        int $height,
        string $host,
        bool $incoming,
        string $ip,
        int $liveTime,
        bool $localIp,
        bool $localhost,
        string $peerId,
        string $port,
        int $recvCount,
        int $recvIdleTime,
        int $sendCount,
        int $sendIdleTime,
        string $state,
        int $supportFlags,
    ) {
        $this->address = $address;
        $this->avgDownload = $avgDownload;
        $this->avgUpload = $avgUpload;
        $this->connectionId = $connectionId;
        $this->currentDownload = $currentDownload;
        $this->currentUpload = $currentUpload;
        $this->height = $height;
        $this->host = $host;
        $this->incoming = $incoming;
        $this->ip = $ip;
        $this->liveTime = $liveTime;
        $this->localIp = $localIp;
        $this->localhost = $localhost;
        $this->peerId = $peerId;
        $this->port = $port;
        $this->recvCount = $recvCount;
        $this->recvIdleTime = $recvIdleTime;
        $this->sendCount = $sendCount;
        $this->sendIdleTime = $sendIdleTime;
        $this->state = $state;
        $this->supportFlags = $supportFlags;
    }
}
