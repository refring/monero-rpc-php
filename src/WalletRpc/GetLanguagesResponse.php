<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a list of available languages for your wallet's seed.
 */
class GetLanguagesResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] List of available languages
     */
    #[Json]
    public array $languages = [];

    /**
     * @var string[]
     */
    #[Json('languages_local', omit_empty: true)]
    public array $languagesLocal = [];
}
