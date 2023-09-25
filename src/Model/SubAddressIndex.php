<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class SubAddressIndex
{
    use JsonSerialize;

    /**
     * Account index.
     */
    #[Json]
    public int $major;

    /**
     * Address index.
     */
    #[Json]
    public int $minor;

    public function __construct(int $major, int $minor)
    {
        $this->major = $major;
        $this->minor = $minor;
    }
}
