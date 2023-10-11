<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\BacklogTransaction;
use RefRing\MoneroRpcPhp\Model\HexDifficulty;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Provide the necessary data to create a custom block template. They are used by p2pool.
 */
class GetMinerDataResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * major fork version.
     */
    #[Json('major_version')]
    public int $majorVersion;

    /**
     * current blockheight.
     */
    #[Json]
    public int $height;

    /**
     * previous block id.
     */
    #[Json('prev_id')]
    public string $prevId;

    /**
     * RandomX seed hash.
     */
    #[Json('seed_hash')]
    public string $seedHash;

    /**
     * network. difficulty.
     */
    #[Json]
    public HexDifficulty $difficulty;

    /**
     * median block weight.
     */
    #[Json('median_weight')]
    public int $medianWeight;

    /**
     * coins mined by the network so far.
     */
    #[Json('already_generated_coins')]
    public int $alreadyGeneratedCoins;

    /** @var BacklogTransaction[] */
    #[Json('tx_backlog', type: BacklogTransaction::class)]
    public array $txBacklog = [];
}
