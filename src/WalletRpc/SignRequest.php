<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Enum\SignatureType;
use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a string.
 */
class SignRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Anything you need to sign.
     */
    #[Json]
    public string $data;

    /**
     * Account index for the signature.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Address index for the signature.
     */
    #[Json('address_index')]
    public int $addressIndex;

    /**
     * Type of signature to generate.
     */
    #[Json('signature_type')]
    public SignatureType $signatureType;

    public static function create(string $data, int $accountIndex = 0, int $addressIndex = 0, SignatureType $signatureType = SignatureType::SPEND): RpcRequest
    {
        $self = new self();
        $self->data = $data;
        $self->accountIndex = $accountIndex;
        $self->addressIndex = $addressIndex;
        $self->signatureType = $signatureType;

        return new RpcRequest('sign', $self);
    }
}
