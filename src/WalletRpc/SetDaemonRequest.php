<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Request\ParameterInterface;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Connect the RPC server to a Monero daemon.Alias: *None*.
 */
class SetDaemonRequest implements ParameterInterface
{
	use JsonSerialize;

	/**
	 * (Optional, Defaults to "") The URL of the daemon to connect to.
	 */
	#[Json(omit_empty: true)]
	public ?string $address;

	/**
	 * (Optional, Defaults to false) If false, some RPC wallet methods will be disabled.
	 */
	#[Json(omit_empty: true)]
	public ?bool $trusted;

	/**
	 * (Optional, Defaults to autodetect; Accepts: disabled, enabled, autodetect) Specifies whether the Daemon uses SSL encryption.
	 */
	#[Json('ssl_support', omit_empty: true)]
	public ?string $sslSupport;

	/**
	 * (Optional) The file path location of the SSL key.
	 */
	#[Json('ssl_private_key_path', omit_empty: true)]
	public ?string $sslPrivateKeyPath;

	/**
	 * (Optional) The file path location of the SSL certificate.
	 */
	#[Json('ssl_certificate_path', omit_empty: true)]
	public ?string $sslCertificatePath;

	/**
	 * (Optional) The file path location of the certificate authority file.
	 */
	#[Json('ssl_ca_file', omit_empty: true)]
	public ?string $sslCaFile;

	/**
	 * (Optional) The SHA1 fingerprints accepted by the SSL certificate.
	 */
	#[Json('ssl_allowed_fingerprints', omit_empty: true)]
	public ?array $sslAllowedFingerprints;

	/**
	 * (Optional, Defaults to false) If false, the certificate must be signed by a trusted certificate authority.
	 */
	#[Json('ssl_allow_any_cert', omit_empty: true)]
	public ?bool $sslAllowAnyCert;

	/**
	 * (Optional)
	 */
	#[Json(omit_empty: true)]
	public ?string $username;

	/**
	 * (Optional)
	 */
	#[Json(omit_empty: true)]
	public ?string $password;


	public static function create(
		?string $address = '',
		?bool $trusted = false,
		?string $sslSupport = 'autodetect',
		?string $sslPrivateKeyPath = null,
		?string $sslCertificatePath = null,
		?string $sslCaFile = null,
		?array $sslAllowedFingerprints = null,
		?bool $sslAllowAnyCert = false,
		?string $username = null,
		?string $password = null,
	): RpcRequest
	{
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
