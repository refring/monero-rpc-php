<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\KeyImage;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Export a signed set of key images.Alias: *None*.
 */
class ExportKeyImagesResponse
{
    use JsonSerialize;

    #[Json]
    public int $offset;

    /** @var KeyImage[] */
    #[Json('signed_key_images')]
    public array $signedKeyImages;
}
