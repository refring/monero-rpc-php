<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class KeyImageList
{
    use JsonSerialize;

    /**
     * @var string[]
     */
    #[Json('key_images')]
    public array $keyImages;
}
