<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\JsonSerialize;

/**
 * Save the blockchain. The blockchain does not need saving and is always saved when modified,
 * however it does a sync to flush the filesystem cache onto the disk for safety purposes against Operating System or Hardware crashes.
 */
class SaveBlockchainResponse extends DaemonBaseResponse
{
    use JsonSerialize;
}
