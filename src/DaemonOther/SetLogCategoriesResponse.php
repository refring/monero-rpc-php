<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Set the daemon log categories.Categories are represented as a comma separated list of `<Category>:<level>`
 */
class SetLogCategoriesResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * daemon log enabled categories
     */
    #[Json]
    public string $categories;
}
