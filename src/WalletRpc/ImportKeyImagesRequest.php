<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use RefRing\MoneroRpcPhp\WalletRpc\Model\SignedKeyImage;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Import signed key images list and verify their spent status.
 */
class ImportKeyImagesRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * (optional)
     */
    #[Json(omit_empty: true)]
    public ?int $offset;

    /** @var SignedKeyImage[] */
    #[Json('signed_key_images')]
    public array $signedKeyImages;


    /**
     * @param SignedKeyImage[] $signedKeyImages
     */
    public static function create(array $signedKeyImages, ?int $offset = null): RpcRequest
    {
        $self = new self();
        $self->offset = $offset;
        $self->signedKeyImages = $signedKeyImages;
        return new RpcRequest('import_key_images', $self);
    }
}
