<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class TransactionData implements JsonDataSerializable
{
    use JsonSerializeBigInt{
        fromJsonData as fromJsonDataOriginal;
    }

    /**
     * Transaction version
     */
    #[Json]
    public int $version;

    /**
     * If not 0, this tells when a transaction output is spendable.
     */
    #[Json('unlock_time')]
    public int $unlockTime;

    /**
     * @var Input[]
     */
    #[Json(type: Input::class)]
    public array $vin = [];

    /**
     * @var Output[]
     */
    #[Json(type: Output::class)]
    public array $vout = [];

    /**
     * @var int[]
     */
    #[Json]
    public array $extra = [];

    /**
     * @var string[]
     */
    #[Json]
    public array $signatures = [];

    /**
     * @var mixed[]
     */
    #[Json]
    public array $rct_signatures = [];

    /**
     * @var mixed[]
     */
    #[Json]
    public array $rctsig_prunable = [];
}
