<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\KeyImage;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Import signed key images list and verify their spent status.Alias: *None*.
 */
class ImportKeyImagesRequest implements ParameterInterface
{
    use JsonSerialize;

    /**
     * (optional)
     */
    #[Json(omit_empty: true)]
    public ?int $offset;

    /** @var KeyImage[] */
    #[Json('signed_key_images')]
    public array $signedKeyImages;


    /**
     * @param KeyImage[] $signedKeyImages
     */
    public static function create(array $signedKeyImages, ?int $offset = null): RpcRequest
    {
        $self = new self();
        $self->offset = $offset;
        $self->signedKeyImages = $signedKeyImages;
        return new RpcRequest('import_key_images', $self);
    }
}
