<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use RefRing\MoneroRpcPhp\Monero\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Output implements JsonDataSerializable
{
    use JsonSerializeBigInt{
        fromJsonData as fromJsonDataOriginal;
    }

    #[Json]
    public Amount $amount;

    /**
     * @var string The stealth public key of the receiver. Whoever owns the private key associated with this key controls this transaction output.
     */
    public string $key;

    #[Json(['target', 'tagged_key', 'view_tag'])]
    public ?string $viewTag = null;

    /**
     * @param string[] $jd
     * @param mixed[]|string $path
     */
    public static function fromJsonData($jd, array|string $path = []): static
    {
        $data = self::fromJsonDataOriginal($jd, $path);

        if (isset($jd['target']['tagged_key']['key'])) { // @phpstan-ignore-line
            $data->key = (string) $jd['target']['tagged_key']['key'];
        }

        if (isset($jd['target']['key'])) { // @phpstan-ignore-line
            $data->key = (string) $jd['target']['key'];
        }

        return $data;
    }
}
