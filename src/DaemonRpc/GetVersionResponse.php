<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Model\HardforkInformation;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Give the node current version
 */
class GetVersionResponse extends DaemonBaseResponse
{
    use JsonSerialize;

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
    public array $hardForks;
}
