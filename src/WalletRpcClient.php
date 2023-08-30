<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp;

use RefRing\MoneroRpcPhp\Model\QueryKeyType;
use RefRing\MoneroRpcPhp\Model\SubAddressIndex;
use RefRing\MoneroRpcPhp\WalletRpc\AddAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\AddAddressBookResponse;
use RefRing\MoneroRpcPhp\WalletRpc\AutoRefreshRequest;
use RefRing\MoneroRpcPhp\WalletRpc\AutoRefreshResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ChangeWalletPasswordRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ChangeWalletPasswordResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CheckReserveProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckReserveProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CheckSpendProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckSpendProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxKeyResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CloseWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CloseWalletResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAccountRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAccountResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\CreateWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateWalletResponse;
use RefRing\MoneroRpcPhp\WalletRpc\DeleteAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\DeleteAddressBookResponse;
use RefRing\MoneroRpcPhp\WalletRpc\DescribeTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\DescribeTransferResponse;
use RefRing\MoneroRpcPhp\WalletRpc\EditAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\EditAddressBookResponse;
use RefRing\MoneroRpcPhp\WalletRpc\EstimateTxSizeAndWeightRequest;
use RefRing\MoneroRpcPhp\WalletRpc\EstimateTxSizeAndWeightResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ExchangeMultisigKeysRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExchangeMultisigKeysResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ExportKeyImagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportKeyImagesResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ExportMultisigInfoRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportMultisigInfoResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ExportOutputsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportOutputsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\FinalizeMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FinalizeMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\FreezeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FreezeResponse;
use RefRing\MoneroRpcPhp\WalletRpc\FrozenRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FrozenResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GenerateFromKeysRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GenerateFromKeysResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountTagsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountTagsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressBookResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressIndexRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressIndexResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAttributeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAttributeResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetBalanceRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetBalanceResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetBulkPaymentsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetBulkPaymentsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetHeightRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetHeightResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetLanguagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetLanguagesResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetPaymentsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetPaymentsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetReserveProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetReserveProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetSpendProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetSpendProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransferByTxidRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransferByTxidResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransfersRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransfersResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxKeyResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxNotesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxNotesResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxProofResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetVersionRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetVersionResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ImportKeyImagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportKeyImagesResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ImportMultisigInfoRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportMultisigInfoResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ImportOutputsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportOutputsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\IncomingTransfersRequest;
use RefRing\MoneroRpcPhp\WalletRpc\IncomingTransfersResponse;
use RefRing\MoneroRpcPhp\WalletRpc\IsMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\IsMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAccountRequest;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAccountResponse;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\MakeIntegratedAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeIntegratedAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\MakeMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\MakeUriRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeUriResponse;
use RefRing\MoneroRpcPhp\WalletRpc\OpenWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\OpenWalletResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ParseUriRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ParseUriResponse;
use RefRing\MoneroRpcPhp\WalletRpc\PrepareMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\PrepareMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\QueryKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\QueryKeyResponse;
use RefRing\MoneroRpcPhp\WalletRpc\RefreshRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RefreshResponse;
use RefRing\MoneroRpcPhp\WalletRpc\RelayTxRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RelayTxResponse;
use RefRing\MoneroRpcPhp\WalletRpc\RescanBlockchainRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RescanBlockchainResponse;
use RefRing\MoneroRpcPhp\WalletRpc\RescanSpentRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RescanSpentResponse;
use RefRing\MoneroRpcPhp\WalletRpc\RestoreDeterministicWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RestoreDeterministicWalletResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SetAccountTagDescriptionRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetAccountTagDescriptionResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SetAttributeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetAttributeResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SetDaemonRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetDaemonResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SetTxNotesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetTxNotesResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SignMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SignRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SignTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignTransferResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SplitIntegratedAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SplitIntegratedAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\StartMiningRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StartMiningResponse;
use RefRing\MoneroRpcPhp\WalletRpc\StopMiningRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StopMiningResponse;
use RefRing\MoneroRpcPhp\WalletRpc\StopWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StopWalletResponse;
use RefRing\MoneroRpcPhp\WalletRpc\StoreRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StoreResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitMultisigResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitTransferResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SweepAllRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepAllResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SweepDustRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepDustResponse;
use RefRing\MoneroRpcPhp\WalletRpc\SweepSingleRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepSingleResponse;
use RefRing\MoneroRpcPhp\WalletRpc\TagAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TagAccountsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ThawRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ThawResponse;
use RefRing\MoneroRpcPhp\WalletRpc\TransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TransferResponse;
use RefRing\MoneroRpcPhp\WalletRpc\TransferSplitRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TransferSplitResponse;
use RefRing\MoneroRpcPhp\WalletRpc\UntagAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\UntagAccountsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\ValidateAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ValidateAddressResponse;
use RefRing\MoneroRpcPhp\WalletRpc\VerifyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\VerifyResponse;

class WalletRpcClient extends JsonRpcClient
{
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
    ): SetDaemonResponse {
        return $this->handleRequest(SetDaemonRequest::create($address, $trusted, $sslSupport, $sslPrivateKeyPath, $sslCertificatePath, $sslCaFile, $sslAllowedFingerprints, $sslAllowAnyCert, $username, $password), SetDaemonResponse::class);
    }


    public function getBalance(
        int $accountIndex,
        array $addressIndices = null,
        bool $allAccounts = false,
        bool $strict = false,
    ): GetBalanceResponse {
        return $this->handleRequest(GetBalanceRequest::create($accountIndex, $addressIndices, $allAccounts, $strict), GetBalanceResponse::class);
    }


    public function getAddress(int $accountIndex, array $addressIndex = null): GetAddressResponse
    {
        return $this->handleRequest(GetAddressRequest::create($accountIndex, $addressIndex), GetAddressResponse::class);
    }


    public function getAddressIndex(string $address): GetAddressIndexResponse
    {
        return $this->handleRequest(GetAddressIndexRequest::create($address), GetAddressIndexResponse::class);
    }


    public function createAddress(int $accountIndex, string $label = null, int $count = 1): CreateAddressResponse
    {
        return $this->handleRequest(CreateAddressRequest::create($accountIndex, $label, $count), CreateAddressResponse::class);
    }


    public function labelAddress(SubAddressIndex $index, string $label): LabelAddressResponse
    {
        return $this->handleRequest(LabelAddressRequest::create($index, $label), LabelAddressResponse::class);
    }


    public function validateAddress(
        string $address,
        bool $anyNetType = false,
        bool $allowOpenalias = false,
    ): ValidateAddressResponse {
        return $this->handleRequest(ValidateAddressRequest::create($address, $anyNetType, $allowOpenalias), ValidateAddressResponse::class);
    }


    public function getAccounts(
        string $tag = null,
        bool $regex = false,
        bool $strictBalances = null,
    ): GetAccountsResponse {
        return $this->handleRequest(GetAccountsRequest::create($tag, $regex, $strictBalances), GetAccountsResponse::class);
    }


    public function createAccount(string $label = null): CreateAccountResponse
    {
        return $this->handleRequest(CreateAccountRequest::create($label), CreateAccountResponse::class);
    }


    public function labelAccount(int $accountIndex, string $label): LabelAccountResponse
    {
        return $this->handleRequest(LabelAccountRequest::create($accountIndex, $label), LabelAccountResponse::class);
    }


    public function getAccountTags(): GetAccountTagsResponse
    {
        return $this->handleRequest(GetAccountTagsRequest::create(), GetAccountTagsResponse::class);
    }


    public function tagAccounts(string $tag, array $accounts): TagAccountsResponse
    {
        return $this->handleRequest(TagAccountsRequest::create($tag, $accounts), TagAccountsResponse::class);
    }


    public function untagAccounts(array $accounts): UntagAccountsResponse
    {
        return $this->handleRequest(UntagAccountsRequest::create($accounts), UntagAccountsResponse::class);
    }


    public function setAccountTagDescription(string $tag, string $description): SetAccountTagDescriptionResponse
    {
        return $this->handleRequest(SetAccountTagDescriptionRequest::create($tag, $description), SetAccountTagDescriptionResponse::class);
    }


    public function getHeight(): GetHeightResponse
    {
        return $this->handleRequest(GetHeightRequest::create(), GetHeightResponse::class);
    }


    public function transfer(
        array $destinations,
        int $accountIndex = 0,
        array $subaddrIndices = [],
        int $priority = null,
        int $mixin = null,
        int $ringSize = null,
        int $unlockTime = null,
        bool $getTxKey = null,
        bool $doNotRelay = false,
        bool $getTxHex = false,
        bool $getTxMetadata = false,
    ): TransferResponse {
        return $this->handleRequest(TransferRequest::create($destinations, $accountIndex, $subaddrIndices, $priority, $mixin, $ringSize, $unlockTime, $getTxKey, $doNotRelay, $getTxHex, $getTxMetadata), TransferResponse::class);
    }


    public function transferSplit(
        array $destinations,
        int $accountIndex = 0,
        array $subaddrIndices = [],
        int $ringSize = null,
        int $unlockTime = null,
        string $paymentId = null,
        bool $getTxKeys = null,
        int $priority = null,
        bool $doNotRelay = false,
        bool $getTxHex = null,
        bool $getTxMetadata = null,
    ): TransferSplitResponse {
        return $this->handleRequest(TransferSplitRequest::create($destinations, $accountIndex, $subaddrIndices, $ringSize, $unlockTime, $paymentId, $getTxKeys, $priority, $doNotRelay, $getTxHex, $getTxMetadata), TransferSplitResponse::class);
    }


    public function signTransfer(
        string $unsignedTxset,
        bool $exportRaw = false,
        bool $getTxKeys = null,
    ): SignTransferResponse {
        return $this->handleRequest(SignTransferRequest::create($unsignedTxset, $exportRaw, $getTxKeys), SignTransferResponse::class);
    }


    public function submitTransfer(string $txDataHex): SubmitTransferResponse
    {
        return $this->handleRequest(SubmitTransferRequest::create($txDataHex), SubmitTransferResponse::class);
    }


    public function sweepDust(
        bool $getTxKeys = null,
        bool $doNotRelay = false,
        bool $getTxHex = false,
        bool $getTxMetadata = false,
    ): SweepDustResponse {
        return $this->handleRequest(SweepDustRequest::create($getTxKeys, $doNotRelay, $getTxHex, $getTxMetadata), SweepDustResponse::class);
    }


    public function sweepAll(
        string $address,
        int $accountIndex = null,
        array $subaddrIndices = null,
        bool $subaddrIndicesAll = false,
        int $priority = null,
        int $outputs,
        int $ringSize,
        int $unlockTime,
        string $paymentId = null,
        bool $getTxKeys = null,
        int $belowAmount = null,
        bool $doNotRelay = false,
        bool $getTxHex = false,
        bool $getTxMetadata = false,
    ): SweepAllResponse {
        return $this->handleRequest(SweepAllRequest::create($address, $accountIndex, $subaddrIndices, $subaddrIndicesAll, $priority, $outputs, $ringSize, $unlockTime, $paymentId, $getTxKeys, $belowAmount, $doNotRelay, $getTxHex, $getTxMetadata), SweepAllResponse::class);
    }


    public function sweepSingle(
        string $address,
        int $priority = null,
        int $outputs,
        int $ringSize,
        int $unlockTime,
        string $paymentId = null,
        bool $getTxKey = null,
        string $keyImage,
        bool $doNotRelay = false,
        bool $getTxHex = false,
        bool $getTxMetadata = false,
    ): SweepSingleResponse {
        return $this->handleRequest(SweepSingleRequest::create($address, $priority, $outputs, $ringSize, $unlockTime, $paymentId, $getTxKey, $keyImage, $doNotRelay, $getTxHex, $getTxMetadata), SweepSingleResponse::class);
    }


    public function relayTx(string $hex): RelayTxResponse
    {
        return $this->handleRequest(RelayTxRequest::create($hex), RelayTxResponse::class);
    }


    public function store(): StoreResponse
    {
        return $this->handleRequest(StoreRequest::create(), StoreResponse::class);
    }


    public function getPayments(string $paymentId): GetPaymentsResponse
    {
        return $this->handleRequest(GetPaymentsRequest::create($paymentId), GetPaymentsResponse::class);
    }


    public function getBulkPayments(array $paymentIds, int $minBlockHeight): GetBulkPaymentsResponse
    {
        return $this->handleRequest(GetBulkPaymentsRequest::create($paymentIds, $minBlockHeight), GetBulkPaymentsResponse::class);
    }


    public function incomingTransfers(
        string $transferType,
        int $accountIndex = null,
        array $subaddrIndices = null,
    ): IncomingTransfersResponse {
        return $this->handleRequest(IncomingTransfersRequest::create($transferType, $accountIndex, $subaddrIndices), IncomingTransfersResponse::class);
    }


    /**
     * @param QueryKeyType $keyType Which key to retrieve: "mnemonic" - the mnemonic seed (older wallets do not have one) OR "view_key" - the view key OR "spend_key".
     */
    public function queryKey(QueryKeyType $keyType): QueryKeyResponse
    {
        return $this->handleRequest(QueryKeyRequest::create($keyType), QueryKeyResponse::class);
    }


    public function makeIntegratedAddress(
        string $standardAddress = null,
        string $paymentId = null,
    ): MakeIntegratedAddressResponse {
        return $this->handleRequest(MakeIntegratedAddressRequest::create($standardAddress, $paymentId), MakeIntegratedAddressResponse::class);
    }


    public function splitIntegratedAddress(string $integratedAddress): SplitIntegratedAddressResponse
    {
        return $this->handleRequest(SplitIntegratedAddressRequest::create($integratedAddress), SplitIntegratedAddressResponse::class);
    }


    public function stopWallet(): StopWalletResponse
    {
        return $this->handleRequest(StopWalletRequest::create(), StopWalletResponse::class);
    }


    public function rescanBlockchain(): RescanBlockchainResponse
    {
        return $this->handleRequest(RescanBlockchainRequest::create(), RescanBlockchainResponse::class);
    }


    public function setTxNotes(array $txids, array $notes): SetTxNotesResponse
    {
        return $this->handleRequest(SetTxNotesRequest::create($txids, $notes), SetTxNotesResponse::class);
    }


    public function getTxNotes(array $txids): GetTxNotesResponse
    {
        return $this->handleRequest(GetTxNotesRequest::create($txids), GetTxNotesResponse::class);
    }


    public function setAttribute(string $key, string $value): SetAttributeResponse
    {
        return $this->handleRequest(SetAttributeRequest::create($key, $value), SetAttributeResponse::class);
    }


    public function getAttribute(string $key): GetAttributeResponse
    {
        return $this->handleRequest(GetAttributeRequest::create($key), GetAttributeResponse::class);
    }


    public function getTxKey(string $txid): GetTxKeyResponse
    {
        return $this->handleRequest(GetTxKeyRequest::create($txid), GetTxKeyResponse::class);
    }


    public function checkTxKey(string $txid, string $txKey, string $address): CheckTxKeyResponse
    {
        return $this->handleRequest(CheckTxKeyRequest::create($txid, $txKey, $address), CheckTxKeyResponse::class);
    }


    public function getTxProof(string $txid, string $address, string $message = null): GetTxProofResponse
    {
        return $this->handleRequest(GetTxProofRequest::create($txid, $address, $message), GetTxProofResponse::class);
    }


    public function checkTxProof(
        string $txid,
        string $address,
        string $message = null,
        string $signature,
    ): CheckTxProofResponse {
        return $this->handleRequest(CheckTxProofRequest::create($txid, $address, $message, $signature), CheckTxProofResponse::class);
    }


    public function getSpendProof(string $txid, string $message = null): GetSpendProofResponse
    {
        return $this->handleRequest(GetSpendProofRequest::create($txid, $message), GetSpendProofResponse::class);
    }


    public function checkSpendProof(string $txid, string $message = null, string $signature): CheckSpendProofResponse
    {
        return $this->handleRequest(CheckSpendProofRequest::create($txid, $message, $signature), CheckSpendProofResponse::class);
    }


    public function getReserveProof(
        bool $all,
        int $accountIndex,
        int $amount,
        string $message = null,
    ): GetReserveProofResponse {
        return $this->handleRequest(GetReserveProofRequest::create($all, $accountIndex, $amount, $message), GetReserveProofResponse::class);
    }


    public function checkReserveProof(
        string $address,
        string $message = null,
        string $signature,
    ): CheckReserveProofResponse {
        return $this->handleRequest(CheckReserveProofRequest::create($address, $message, $signature), CheckReserveProofResponse::class);
    }


    public function getTransfers(
        bool $in,
        bool $out,
        bool $pending,
        bool $failed,
        bool $pool,
        bool $filterByHeight = null,
        int $minHeight = null,
        int $maxHeight = null,
        int $accountIndex = null,
        array $subaddrIndices = [],
        bool $allAccounts = false,
    ): GetTransfersResponse {
        return $this->handleRequest(GetTransfersRequest::create($in, $out, $pending, $failed, $pool, $filterByHeight, $minHeight, $maxHeight, $accountIndex, $subaddrIndices, $allAccounts), GetTransfersResponse::class);
    }


    public function getTransferByTxid(string $txid, int $accountIndex = null): GetTransferByTxidResponse
    {
        return $this->handleRequest(GetTransferByTxidRequest::create($txid, $accountIndex), GetTransferByTxidResponse::class);
    }


    public function describeTransfer(
        string $unsignedTxset = null,
        string $multisigTxset = null,
    ): DescribeTransferResponse {
        return $this->handleRequest(DescribeTransferRequest::create($unsignedTxset, $multisigTxset), DescribeTransferResponse::class);
    }


    public function sign(string $data): SignResponse
    {
        return $this->handleRequest(SignRequest::create($data), SignResponse::class);
    }


    public function verify(string $data, string $address, string $signature): VerifyResponse
    {
        return $this->handleRequest(VerifyRequest::create($data, $address, $signature), VerifyResponse::class);
    }


    public function exportOutputs(bool $all = false): ExportOutputsResponse
    {
        return $this->handleRequest(ExportOutputsRequest::create($all), ExportOutputsResponse::class);
    }


    public function importOutputs(string $outputsDataHex): ImportOutputsResponse
    {
        return $this->handleRequest(ImportOutputsRequest::create($outputsDataHex), ImportOutputsResponse::class);
    }


    public function exportKeyImages(bool $all = false): ExportKeyImagesResponse
    {
        return $this->handleRequest(ExportKeyImagesRequest::create($all), ExportKeyImagesResponse::class);
    }


    public function importKeyImages(int $offset = null, array $signedKeyImages): ImportKeyImagesResponse
    {
        return $this->handleRequest(ImportKeyImagesRequest::create($offset, $signedKeyImages), ImportKeyImagesResponse::class);
    }


    public function makeUri(
        string $address,
        int $amount = null,
        string $paymentId = null,
        string $recipientName = null,
        string $txDescription = null,
    ): MakeUriResponse {
        return $this->handleRequest(MakeUriRequest::create($address, $amount, $paymentId, $recipientName, $txDescription), MakeUriResponse::class);
    }


    public function parseUri(string $uri): ParseUriResponse
    {
        return $this->handleRequest(ParseUriRequest::create($uri), ParseUriResponse::class);
    }


    public function getAddressBook(array $entries): GetAddressBookResponse
    {
        return $this->handleRequest(GetAddressBookRequest::create($entries), GetAddressBookResponse::class);
    }


    public function addAddressBook(
        string $address,
        string $paymentId = null,
        string $description = null,
    ): AddAddressBookResponse {
        return $this->handleRequest(AddAddressBookRequest::create($address, $paymentId, $description), AddAddressBookResponse::class);
    }


    public function editAddressBook(
        int $index,
        bool $setAddress,
        string $address = null,
        bool $setDescription,
        string $description = null,
        bool $setPaymentId,
        string $paymentId = null,
    ): EditAddressBookResponse {
        return $this->handleRequest(EditAddressBookRequest::create($index, $setAddress, $address, $setDescription, $description, $setPaymentId, $paymentId), EditAddressBookResponse::class);
    }


    public function deleteAddressBook(int $index): DeleteAddressBookResponse
    {
        return $this->handleRequest(DeleteAddressBookRequest::create($index), DeleteAddressBookResponse::class);
    }


    public function refresh(int $startHeight = null): RefreshResponse
    {
        return $this->handleRequest(RefreshRequest::create($startHeight), RefreshResponse::class);
    }


    public function autoRefresh(bool $enable = true, int $period = null): AutoRefreshResponse
    {
        return $this->handleRequest(AutoRefreshRequest::create($enable, $period), AutoRefreshResponse::class);
    }


    public function rescanSpent(): RescanSpentResponse
    {
        return $this->handleRequest(RescanSpentRequest::create(), RescanSpentResponse::class);
    }


    public function startMining(int $threadsCount, bool $doBackgroundMining, bool $ignoreBattery): StartMiningResponse
    {
        return $this->handleRequest(StartMiningRequest::create($threadsCount, $doBackgroundMining, $ignoreBattery), StartMiningResponse::class);
    }


    public function stopMining(): StopMiningResponse
    {
        return $this->handleRequest(StopMiningRequest::create(), StopMiningResponse::class);
    }


    public function getLanguages(): GetLanguagesResponse
    {
        return $this->handleRequest(GetLanguagesRequest::create(), GetLanguagesResponse::class);
    }


    public function createWallet(string $filename, string $password = null, string $language): CreateWalletResponse
    {
        return $this->handleRequest(CreateWalletRequest::create($filename, $password, $language), CreateWalletResponse::class);
    }


    public function generateFromKeys(
        int $restoreHeight = null,
        string $filename,
        string $address,
        string $spendkey = null,
        string $viewkey,
        string $password,
        bool $autosaveCurrent = true,
    ): GenerateFromKeysResponse {
        return $this->handleRequest(GenerateFromKeysRequest::create($restoreHeight, $filename, $address, $spendkey, $viewkey, $password, $autosaveCurrent), GenerateFromKeysResponse::class);
    }


    public function openWallet(string $filename, string $password = null): OpenWalletResponse
    {
        return $this->handleRequest(OpenWalletRequest::create($filename, $password), OpenWalletResponse::class);
    }


    public function restoreDeterministicWallet(
        string $filename,
        string $password,
        string $seed,
        int $restoreHeight = 0,
        string $language = null,
        string $seedOffset = null,
        bool $autosaveCurrent = true,
    ): RestoreDeterministicWalletResponse {
        return $this->handleRequest(RestoreDeterministicWalletRequest::create($filename, $password, $seed, $restoreHeight, $language, $seedOffset, $autosaveCurrent), RestoreDeterministicWalletResponse::class);
    }


    public function closeWallet(): CloseWalletResponse
    {
        return $this->handleRequest(CloseWalletRequest::create(), CloseWalletResponse::class);
    }


    public function changeWalletPassword(
        string $oldPassword = null,
        string $newPassword = null,
    ): ChangeWalletPasswordResponse {
        return $this->handleRequest(ChangeWalletPasswordRequest::create($oldPassword, $newPassword), ChangeWalletPasswordResponse::class);
    }


    public function isMultisig(): IsMultisigResponse
    {
        return $this->handleRequest(IsMultisigRequest::create(), IsMultisigResponse::class);
    }


    public function prepareMultisig(): PrepareMultisigResponse
    {
        return $this->handleRequest(PrepareMultisigRequest::create(), PrepareMultisigResponse::class);
    }


    public function makeMultisig(array $multisigInfo, int $threshold, string $password = null): MakeMultisigResponse
    {
        return $this->handleRequest(MakeMultisigRequest::create($multisigInfo, $threshold, $password), MakeMultisigResponse::class);
    }


    public function exportMultisigInfo(): ExportMultisigInfoResponse
    {
        return $this->handleRequest(ExportMultisigInfoRequest::create(), ExportMultisigInfoResponse::class);
    }


    public function importMultisigInfo(array $info): ImportMultisigInfoResponse
    {
        return $this->handleRequest(ImportMultisigInfoRequest::create($info), ImportMultisigInfoResponse::class);
    }


    public function finalizeMultisig(array $multisigInfo, string $password = null): FinalizeMultisigResponse
    {
        return $this->handleRequest(FinalizeMultisigRequest::create($multisigInfo, $password), FinalizeMultisigResponse::class);
    }


    public function signMultisig(string $txDataHex): SignMultisigResponse
    {
        return $this->handleRequest(SignMultisigRequest::create($txDataHex), SignMultisigResponse::class);
    }


    public function submitMultisig(string $txDataHex): SubmitMultisigResponse
    {
        return $this->handleRequest(SubmitMultisigRequest::create($txDataHex), SubmitMultisigResponse::class);
    }


    public function getVersion(): GetVersionResponse
    {
        return $this->handleRequest(GetVersionRequest::create(), GetVersionResponse::class);
    }


    public function freeze(string $keyImage): FreezeResponse
    {
        return $this->handleRequest(FreezeRequest::create($keyImage), FreezeResponse::class);
    }


    public function frozen(string $keyImage): FrozenResponse
    {
        return $this->handleRequest(FrozenRequest::create($keyImage), FrozenResponse::class);
    }


    public function thaw(string $keyImage): ThawResponse
    {
        return $this->handleRequest(ThawRequest::create($keyImage), ThawResponse::class);
    }


    public function exchangeMultisigKeys(
        string $password,
        string $multisigInfo,
        bool $forceUpdateUseWithCaution = false,
    ): ExchangeMultisigKeysResponse {
        return $this->handleRequest(ExchangeMultisigKeysRequest::create($password, $multisigInfo, $forceUpdateUseWithCaution), ExchangeMultisigKeysResponse::class);
    }


    public function estimateTxSizeAndWeight(
        int $nInputs,
        int $nOutputs,
        int $ringSize,
        bool $rct,
    ): EstimateTxSizeAndWeightResponse {
        return $this->handleRequest(EstimateTxSizeAndWeightRequest::create($nInputs, $nOutputs, $ringSize, $rct), EstimateTxSizeAndWeightResponse::class);
    }
}
