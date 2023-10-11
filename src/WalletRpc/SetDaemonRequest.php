<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Connect the RPC server to a Monero daemon.
 */
class SetDaemonRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The URL of the daemon to connect to.
     * When omitted the default value is
     */
    #[Json(omit_empty: true)]
    public ?string $address;

    /**
     * If false, some RPC wallet methods will be disabled.
     * When omitted the default value is false
     */
    #[Json(omit_empty: true)]
    public ?bool $trusted;

    /**
     * Specifies whether the Daemon uses SSL encryption.
     * When omitted the default value is autodetect
     */
    #[Json('ssl_support', omit_empty: true)]
    public ?string $sslSupport;

    /**
     * The file path location of the SSL key.
     */
    #[Json('ssl_private_key_path', omit_empty: true)]
    public ?string $sslPrivateKeyPath;

    /**
     * The file path location of the SSL certificate.
     */
    #[Json('ssl_certificate_path', omit_empty: true)]
    public ?string $sslCertificatePath;

    /**
     * The file path location of the certificate authority file.
     */
    #[Json('ssl_ca_file', omit_empty: true)]
    public ?string $sslCaFile;

    /**
     * @var string[] The SHA1 fingerprints accepted by the SSL certificate.
     */
    #[Json('ssl_allowed_fingerprints', omit_empty: true)]
    public ?array $sslAllowedFingerprints;

    /**
     * If false, the certificate must be signed by a trusted certificate authority.
     * When omitted the default value is false
     */
    #[Json('ssl_allow_any_cert', omit_empty: true)]
    public ?bool $sslAllowAnyCert;

    #[Json(omit_empty: true)]
    public ?string $username;

    #[Json(omit_empty: true)]
    public ?string $password;

    /**
     * @param ?string[] $sslAllowedFingerprints
     */
    public static function create(
        ?string $address = '',
        ?bool $trusted = false,
        ?string $sslSupport = 'autodetect',
        ?string $sslPrivateKeyPath = null,
        ?string $sslCertificatePath = null,
        ?string $sslCaFile = null,
        ?array $sslAllowedFingerprints = null,
        ?bool $sslAllowAnyCert = null,
        ?string $username = null,
        ?string $password = null,
    ): RpcRequest {
        $self = new self();
        $self->address = $address;
        $self->trusted = $trusted;
        $self->sslSupport = $sslSupport;
        $self->sslPrivateKeyPath = $sslPrivateKeyPath;
        $self->sslCertificatePath = $sslCertificatePath;
        $self->sslCaFile = $sslCaFile;
        $self->sslAllowedFingerprints = $sslAllowedFingerprints;
        $self->sslAllowAnyCert = $sslAllowAnyCert;
        $self->username = $username;
        $self->password = $password;
        return new RpcRequest('set_daemon', $self);
    }
}
