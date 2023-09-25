<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\SignedKeyImage;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export a signed set of key images.
 */
class ExportKeyImagesResponse
{
    use JsonSerialize;

    #[Json]
    public int $offset;

    /** @var SignedKeyImage[] */
    #[Json('signed_key_images', type: SignedKeyImage::class)]
    public array $signedKeyImages;
}
