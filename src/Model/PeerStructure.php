<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class PeerStructure
{
    use JsonSerialize;

    /**
     * As defined in [get_connections](#get_connections)
     */
    #[Json]
    public $info;


    public function __construct(Connection $info)
    {
        $this->info = $info;
    }
}
