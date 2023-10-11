<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Enum\SignatureType;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Verify a signature on a string.
 */
class VerifyResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    #[Json]
    public bool $good;

    #[Json]
    public int $version;

    #[Json]
    public bool $old;
    #[Json]
    public SignatureType $signatureType;
}
