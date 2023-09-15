<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class HardforkInformation
{
    use JsonSerialize;

    #[Json]
    public int $height;

    #[Json('hf_version')]
    public int $version;
}
