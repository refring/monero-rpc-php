<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\Transfer;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Returns a list of transfers.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class GetTransfersResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var Transfer[] */
    #[Json(type: Transfer::class)]
    public array $in = [];

    /** @var Transfer[] */
    #[Json(type: Transfer::class)]
    public array $out = [];

    /** @var Transfer[] */
    #[Json(type: Transfer::class)]
    public array $pending = [];

    /** @var Transfer[] */
    #[Json(type: Transfer::class)]
    public array $failed = [];

    /** @var Transfer[] */
    #[Json(type: Transfer::class)]
    public array $pool = [];
}
