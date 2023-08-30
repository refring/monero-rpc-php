<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class BannedNode
{
    use JsonSerialize;

    /**
     * Banned host (IP in A.B.C.D form).
     */
    #[Json]
    public string $host;

    /**
     * Banned IP address, in Int format.
     */
    #[Json]
    public int $ip;

    /**
     * Local Unix time that IP is banned until.
     */
    #[Json]
    public int $seconds;


    public function __construct(string $host, int $ip, int $seconds)
    {
        $this->host = $host;
        $this->ip = $ip;
        $this->seconds = $seconds;
    }
}
