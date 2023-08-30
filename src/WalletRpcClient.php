<?php

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\JsonRpcClient;
use RefRing\MoneroRpcPhp\Model\QueryKeyType;
use RefRing\MoneroRpcPhp\WalletRpc\ExportOutputsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportOutputsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressIndexRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressIndexResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetHeightRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetHeightResponse;
use RefRing\MoneroRpcPhp\WalletRpc\QueryKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\QueryKeyResponse;

class WalletRpcClient extends JsonRpcClient
{
    public function getHeight(): GetHeightResponse
    {
        return $this->handleRequest(GetHeightRequest::create(), GetHeightResponse::class);
    }

    public function queryKey(QueryKeyType $keyType): QueryKeyResponse
    {
        return $this->handleRequest(QueryKeyRequest::create($keyType), QueryKeyResponse::class);
    }

    public function getAddressIndex(string $address): GetAddressIndexResponse
    {
        return $this->handleRequest(GetAddressIndexRequest::create($address), GetAddressIndexResponse::class);
    }

    public function exportOutputs(bool $all = false): ExportOutputsResponse
    {
        return $this->handleRequest(ExportOutputsRequest::create($all), ExportOutputsResponse::class);
    }

    public function getBalance(
        int $accountIndex,
        array $addressIndices = null,
        bool $allAccounts = false,
        bool $strict = false,
    ): WalletRpc\GetBalanceResponse {
        return $this->handleRequest(\RefRing\MoneroRpcPhp\WalletRpc\GetBalanceRequest::create($accountIndex, $addressIndices, $allAccounts, $strict), \RefRing\MoneroRpcPhp\WalletRpc\GetBalanceResponse::class);
    }

    public function getAddress(int $accountIndex, array $addressIndex = null): WalletRpc\GetAddressResponse
    {
        return $this->handleRequest(\RefRing\MoneroRpcPhp\WalletRpc\GetAddressRequest::create($accountIndex, $addressIndex), \RefRing\MoneroRpcPhp\WalletRpc\GetAddressResponse::class);
    }

    public function setDaemon(
        string $address = '',
        bool $trusted = false,
        string $sslSupport = 'autodetect',
        string $sslPrivateKeyPath = null,
        string $sslCertificatePath = null,
        string $sslCaFile = null,
        array $sslAllowedFingerprints = null,
        bool $sslAllowAnyCert = false,
        string $username = null,
        string $password = null,
    ): WalletRpc\SetDaemonResponse {
        return $this->handleRequest(\RefRing\MoneroRpcPhp\WalletRpc\SetDaemonRequest::create($address, $trusted, $sslSupport, $sslPrivateKeyPath, $sslCertificatePath, $sslCaFile, $sslAllowedFingerprints, $sslAllowAnyCert, $username, $password), \RefRing\MoneroRpcPhp\WalletRpc\SetDaemonResponse::class);
    }
}
