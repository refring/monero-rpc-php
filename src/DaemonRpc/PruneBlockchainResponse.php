<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class PruneBlockchainResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    #[Json]
    public bool $pruned;

    /**
     * Blockheight at which pruning began.
     */
    #[Json('pruning_seed')]
    public int $pruningSeed;
}
