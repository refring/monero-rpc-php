<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Node
{
    use JsonSerialize;

    /**
     * Host to ban (IP in A.B.C.D form - will support I2P address in the future).
     */
    #[Json(omit_empty: true)]
    public ?string $host;

    /**
     * IP address to ban, in Int format.
     */
    #[Json(omit_empty: true)]
    public ?int $ip;

    /**
     * Set `true` to ban.
     */
    #[Json]
    public bool $ban;

    /**
     * Number of seconds to ban node.
     */
    #[Json]
    public int $seconds;

    public function __construct(?string $host, ?int $ip, bool $ban, int $seconds)
    {
        $this->host = $host;
        $this->ip = $ip;
        $this->ban = $ban;
        $this->seconds = $seconds;
    }
}
