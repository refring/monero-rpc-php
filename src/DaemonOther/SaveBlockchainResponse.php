<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Save the blockchain. The blockchain does not need saving and is always saved when modified,
 * however it does a sync to flush the filesystem cache onto the disk for safety purposes against Operating System or Hardware crashes.
 */
class SaveBlockchainResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;
}
