<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get a list of available languages for your wallet's seed.
 */
class GetLanguagesResponse
{
    use JsonSerialize;

    /**
     * @var string[] List of available languages
     */
    #[Json]
    public array $languages;

    /**
     * @var string[]
     */
    #[Json('languages_local')]
    public array $languagesLocal;
}
