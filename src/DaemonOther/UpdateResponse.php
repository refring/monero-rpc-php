<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonStandardResponseFields;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Update daemon.
 */
class UpdateResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    #[Json('auto_uri')]
    public string $autoUri;

    #[Json]
    public string $hash;

    /**
     * path to download the update
     */
    #[Json]
    public string $path;

    /**
     * States if an update is available to download (`true`) or not (`false`)
     */
    #[Json]
    public bool $update;

    #[Json('user_uri')]
    public string $userUri;

    /**
     * Version available for download.
     */
    #[Json]
    public string $version;
}
