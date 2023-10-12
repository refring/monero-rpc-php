<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\DaemonRpc\Model\HardforkInformation;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Give the node current version
 */
class GetVersionResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    /**
     * States if the daemon software version corresponds to an official tagged release (`true`), or not (`false`)
     */
    #[Json]
    public bool $release;

    #[Json]
    public int $version;

    #[Json('current_height')]
    public int $currentHeight;

    /**
     * @var HardforkInformation[]
     */
    #[Json('hard_forks', type: HardforkInformation::class)]
    public array $hardForks = [];
}
