<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use RefRing\MoneroRpcPhp\Model\KeyImage;
use RefRing\MoneroRpcPhp\Model\QueryKeyType;
use RefRing\MoneroRpcPhp\Model\SubAddressIndex;
use RefRing\MoneroRpcPhp\Model\TransferDestination;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Model\TransferType;
use RefRing\MoneroRpcPhp\Request\RpcRequest;
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
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountsResponse;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountTagsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountTagsResponse;
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

class WalletRpcDeserializationTest extends TestCase
{
    public function testSetDaemon()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = SetDaemonResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetBalance()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"balance":157443303037455077,"blocks_to_unlock":0,"multisig_import_needed":false,"per_subaddress":[{"account_index":0,"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","address_index":0,"balance":157360317826255077,"blocks_to_unlock":0,"label":"Primary account","num_unspent_outputs":5281,"time_to_unlock":0,"unlocked_balance":157360317826255077},{"account_index":0,"address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o","address_index":1,"balance":59985211200000,"blocks_to_unlock":0,"label":"","num_unspent_outputs":1,"time_to_unlock":0,"unlocked_balance":59985211200000}],"time_to_unlock":0,"unlocked_balance":157443303037455077}}';
        $response = GetBalanceResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","addresses":[{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","address_index":0,"label":"Primary account","used":true},{"address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o","address_index":1,"label":"","used":true},{"address":"77xa6Dha7kzCQuvmd8iB5VYoMkdenwCNRU9khGhExXQ8KLL3z1N1ZATBD1sFPenyHWT9cm4fVFnCAUApY53peuoZFtwZiw5","address_index":4,"label":"test2","used":true}]}}';
        $response = GetAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetAddressIndex()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"index":{"major":0,"minor":1}}}';
        $response = GetAddressIndexResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCreateAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"7BG5jr9QS5sGMdpbBrZEwVLZjSKJGJBsXdZLt8wiXyhhLjy7x2LZxsrAnHTgD8oG46ZtLjUGic2pWc96GFkGNPQQDA3Dt7Q","address_index":5,"address_indices":[5,6],"addresses":["7BG5jr9QS5sGMdpbBrZEwVLZjSKJGJBsXdZLt8wiXyhhLjy7x2LZxsrAnHTgD8oG46ZtLjUGic2pWc96GFkGNPQQDA3Dt7Q","72sRxcVHmxV9RSpEJoSyukj4z2zjk3AhmRJabPSonGHZepYfyFDiKKtPvreg7kYiFHMHFG9Wi4Hqg9uKzP44aieQJVccLnc"]}}';
        $response = CreateAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testLabelAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = LabelAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testValidateAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"integrated":false,"nettype":"mainnet","openalias_address":"","subaddress":false,"valid":true}}';
        $response = ValidateAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetAccounts()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"subaddress_accounts":[{"account_index":0,"balance":157663195572433688,"base_address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","label":"Primary account","tag":"myTag","unlocked_balance":157443303037455077},{"account_index":1,"balance":0,"base_address":"77Vx9cs1VPicFndSVgYUvTdLCJEZw9h81hXLMYsjBCXSJfUehLa9TDW3Ffh45SQa7xb6dUs18mpNxfUhQGqfwXPSMrvKhVp","label":"Secondary account","tag":"myTag","unlocked_balance":0}],"total_balance":157663195572433688,"total_unlocked_balance":157443303037455077}}';
        $response = GetAccountsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCreateAccount()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"account_index":1,"address":"77Vx9cs1VPicFndSVgYUvTdLCJEZw9h81hXLMYsjBCXSJfUehLa9TDW3Ffh45SQa7xb6dUs18mpNxfUhQGqfwXPSMrvKhVp"}}';
        $response = CreateAccountResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testLabelAccount()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = LabelAccountResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetAccountTags()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"account_tags":[{"accounts":[0],"label":"Test tag","tag":"myTag"}]}}';
        $response = GetAccountTagsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testTagAccounts()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = TagAccountsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testUntagAccounts()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = UntagAccountsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testSetAccountTagDescription()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = SetAccountTagDescriptionResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetHeight()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"height":145545}}';
        $response = GetHeightResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testTransfer()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"amount":300000000000,"fee":86897600000,"multisig_txset":"","tx_blob":"","tx_hash":"7663438de4f72b25a0e395b770ea9ecf7108cd2f0c4b75be0b14a103d3362be9","tx_key":"25c9d8ec20045c80c93d665c9d3684aab7335f8b2cd02e1ba2638485afd1c70e236c4bdd7a2f1cb511dbf466f13421bdf8df988b7b969c448ca6239d7251490e4bf1bbf9f6ffacffdcdc93b9d1648ec499eada4d6b4e02ce92d4a1c0452e5d009fbbbf15b549df8856205a4c7bda6338d82c823f911acd00cb75850b198c5803","tx_metadata":"","unsigned_txset":""}}';
        $response = TransferResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testTransferSplit()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"amount_list":[3000000000000],"fee_list":[473710000],"weight_list":51456,"multisig_txset":"","tx_hash_list":["4adcdc1af3f665770cdf8fb7a380887cd07ac53c2b771bd18df5ca375d5e7540"],"tx_key_list":["5b455c0f97168be652a2c03c5c68a064bb84cdae4ddef01b5c48d73a0bbb27075fb714f2ca19ea6c8ff592417e606addea6deb1d6530e2969f75681ffcbfc4075677b94a8c9197963ae38fa6f543ee68f0a4c4bbda4c453f39538f00b28e980ea08509730b51c004960101ba2f3adbc34cbbdff0d5af9dba061b523090debd06"],"unsigned_txset":"","spent_key_images_list":[{"key_images":["cea4f54494d4cc28c006af7551b57a49eb6e8aac966ffa7b169f32298213c6ca"]}]}}';
        $response = TransferSplitResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSignTransfer()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"amount":1000000000000,"fee":15202740000,"multisig_txset":"","tx_blob":"...long_hex...","tx_hash":"c648ba0a049e5ce4ec21361dbf6e4b21eac0f828eea9090215de86c76b31d0a4","tx_key":"","tx_metadata":"","unsigned_txset":"...long_hex..."}}';
        $response = SignTransferResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSubmitTransfer()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"tx_hash_list":["40fad7c828bb383ac02648732f7afce9adc520ba5629e1f5d9c03f584ac53d74"]}}';
        $response = SubmitTransferResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSweepDust()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"multisig_txset":"","unsigned_txset":""}}';
        $response = SweepDustResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSweepAll()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"amount_list":[9985885770000],"fee_list":[14114230000],"multisig_txset":"","spent_key_images_list":[{"key_images":["cea4f54494d4cc28c006af7551b57a49eb6e8aac966ffa7b169f32298213c6ca"]}],"tx_hash_list":["ab4b6b65cc8cd8c9dd317d0b90d97582d68d0aa1637b0065b05b61f9a66ea5c5"],"tx_key_list":["b9b4b39d3bb3062ddb85ec0266d4df39058f4c86077d99309f218ce4d76af607"],"unsigned_txset":"","weight_list":[6414]}}';
        $response = SweepAllResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSweepSingle()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"amount":27126892247503,"spent_key_images":{"key_images":["a7834459ef795d2efb6f665d2fd758c8d9288989d8d4c712a68f8023f7804a5e"]},"fee":14111630000,"multisig_txset":"","tx_blob":"","tx_hash":"106d4391a031e5b735ded555862fec63233e34e5fa4fc7edcfdbe461c275ae5b","tx_key":"222e62ffd46a15c92184d6d9cccec5eafbddd19884c0f4f8f10e068015947e05","tx_metadata":"","unsigned_txset":"","weight":1528}}';
        $response = SweepSingleResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testRelayTx()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"tx_hash":"1c42dcc5672bb09bccf33fb1e9ab4a498af59a6dbd33b3d0cfb289b9e0e25fa5"}}';
        $response = RelayTxResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testStore()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = StoreResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetPayments()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"payments":[{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","amount":1000000000000,"block_height":127606,"payment_id":"60900e5603bf96e3","subaddr_index":{"major":0,"minor":0},"tx_hash":"3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f","unlock_time":0,"locked":false}]}}';
        $response = GetPaymentsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetBulkPayments()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"payments":[{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","amount":1000000000000,"block_height":127606,"payment_id":"60900e5603bf96e3","subaddr_index":{"major":0,"minor":0},"tx_hash":"3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f","unlock_time":0}]}}';
        $response = GetBulkPaymentsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testIncomingTransfers()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"transfers":[{"amount":60000000000000,"block_height":2758159,"global_index":122405,"key_image":"768f5144777eb23477ab7acf83562581d690abaf98ca897c03a9d2b900eb479b","spent":true,"subaddr_index":{"major":0,"minor":3},"tx_hash":"f53401f21c6a43e44d5dd7a90eba5cf580012ad0e15d050059136f8a0da34f6b","pubkey":"253c35abc9e88268df40e622376572adedd391f667ef8db9f3d20789f733b35a","frozen":false,"unlocked":false},{"amount":27126892247503,"blockheight":2758161,"global_index":594994,"key_image":"7e561394806afd1be61980cc3431f6ef3569fa9151cd8d234f8ec13aa145695e","spent":false,"subaddr_index":{"major":0,"minor":3},"tx_hash":"106d4391a031e5b735ded555862fec63233e34e5fa4fc7edcfdbe461c275ae5b","pubkey":"c1544f7fe535a643bb2c4bebdcbcfd2b7c16681de298c2f4712d4f67273e9472","frozen":false,"unlocked":true},{"amount":27169374733655,"block_height":2758670,"global_index":594997,"key_image":"e76c0a3bfeaae35e4173712f782eb34011198e26b990225b71aa787c8ba8a157","spent":false,"subaddr_index":{"major":0,"minor":3},"tx_hash":"0bd959b59117ee1254bd8e5aa8e77ec04ef744144a1ffb2d5c1eb9380a719621","pubkey":"99cb6ec639ee514c00758934aab69c965c4ff0dbc136d9199011a683be1e6df1","frozen":false,"unlocked":true}]}}';
        $response = IncomingTransfersResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testQueryKey()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"key":"0a1a38f6d246e894600a3e27238a064bf5e8d91801df47a17107596b1378e501"}}';
        $response = QueryKeyResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testMakeIntegratedAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"integrated_address":"5F38Rw9HKeaLQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZXCkbHUXdPHyiUeRyokn","payment_id":"420fa29b2d9a49f5"}}';
        $response = MakeIntegratedAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSplitIntegratedAddress()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"is_subaddress":false,"payment_id":"420fa29b2d9a49f5","standard_address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt"}}';
        $response = SplitIntegratedAddressResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testStopWallet()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = StopWalletResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testRescanBlockchain()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = RescanBlockchainResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testSetTxNotes()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = SetTxNotesResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetTxNotes()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"notes":["This is an example"]}}';
        $response = GetTxNotesResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSetAttribute()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = SetAttributeResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetAttribute()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"value":"my_value"}}';
        $response = GetAttributeResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetTxKey()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"tx_key":"feba662cf8fb6d0d0da18fc9b70ab28e01cc76311278fdd7fe7ab16360762b06"}}';
        $response = GetTxKeyResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCheckTxKey()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"confirmations":0,"in_pool":false,"received":1000000000000}}';
        $response = CheckTxKeyResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetTxProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"signature":"InProofV13vqBCT6dpSAXkypZmSEMPGVnNRFDX2vscUYeVS4WnSVnV5BwLs31T9q6Etfj9Wts6tAxSAS4gkMeSYzzLS7Gt4vvCSQRh9niGJMUDJsB5hTzb2XJiCkUzWkkcjLFBBRVD5QZ"}}';
        $response = GetTxProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCheckTxProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"confirmations":482,"good":true,"in_pool":false,"received":1000000000000}}';
        $response = CheckTxProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetSpendProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"signature":"SpendProofV1aSh8Todhk54736iXgV6vJAFP7egxByuMWZeyNDaN2JY737S95X5zz5mNMQSuCNSLjjhi5HJCsndpNWSNVsuThxwv285qy1KkUrLFRkxMSCjfL6bbycYN33ScZ5UB4Fzseceo1ndpL393T1q638VmcU3a56dhNHF1RPZFiGPS61FA78nXFSqE9uoKCCoHkEz83M1dQVhxZV5CEPF2P6VioGTKgprLCH9vvj9k1ivd4SX19L2VSMc3zD1u3mkR24ioETvxBoLeBSpxMoikyZ6inhuPm8yYo9YWyFtQK4XYfAV9mJ9knz5fUPXR8vvh7KJCAg4dqeJXTVb4mbMzYtsSZXHd6ouWoyCd6qMALdW8pKhgMCHcVYMWp9X9WHZuCo9rsRjRpg15sJUw7oJg1JoGiVgj8P4JeGDjnZHnmLVa5bpJhVCbMhyM7JLXNQJzFWTGC27TQBbthxCfQaKdusYnvZnKPDJWSeceYEFzepUnsWhQtyhbb73FzqgWC4eKEFKAZJqT2LuuSoxmihJ9acnFK7Ze23KTVYgDyMKY61VXADxmSrBvwUtxCaW4nQtnbMxiPMNnDMzeixqsFMBtN72j5UqhiLRY99k6SE7Qf5f29haNSBNSXCFFHChPKNTwJrehkofBdKUhh2VGPqZDNoefWUwfudeu83t85bmjv8Q3LrQSkFgFjRT5tLo8TMawNXoZCrQpyZrEvnodMDDUUNf3NL7rxyv3gM1KrTWjYaWXFU2RAsFee2Q2MTwUW7hR25cJvSFuB1BX2bfkoCbiMk923tHZGU2g7rSKF1GDDkXAc1EvFFD4iGbh1Q5t6hPRhBV8PEncdcCWGq5uAL5D4Bjr6VXG8uNeCy5oYWNgbZ5JRSfm7QEhPv8Fy9AKMgmCxDGMF9dVEaU6tw2BAnJavQdfrxChbDBeQXzCbCfep6oei6n2LZdE5Q84wp7eoQFE5Cwuo23tHkbJCaw2njFi3WGBbA7uGZaGHJPyB2rofTWBiSUXZnP2hiE9bjJghAcDm1M4LVLfWvhZmFEnyeru3VWMETnetz1BYLUC5MJGFXuhnHwWh7F6r74FDyhdswYop4eWPbyrXMXmUQEccTGd2NaT8g2VHADZ76gMC6BjWESvcnz2D4n8XwdmM7ZQ1jFwhuXrBfrb1dwRasyXxxHMGAC2onatNiExyeQ9G1W5LwqNLAh9hvcaNTGaYKYXoceVzLkgm6e5WMkLsCwuZXvB"}}';
        $response = GetSpendProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCheckSpendProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"good":true}}';
        $response = CheckSpendProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetReserveProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"signature":"ReserveProofV11BZ23sBt9sZJeGccf84mzyAmNCP3KzYbE1111112VKmH111118NfCYJQjZ6c46gT2kXgcHCaSSZeL8sRdzqjqx7i1e7FQfQGu2o113UYFVdwzHQi3iENDPa76Kn1BvywbKz3bMkXdZkBEEhBSF4kjjGaiMJ1ucKb6wvMVC4A8sA4nZEdL2Mk3wBucJCYTZwKqA8i1M113kqakDkG25FrjiDqdQTCYz2wDBmfKxF3eQiV5FWzZ6HmAyxnqTWUiMWukP9A3Edy3ZXqjP1b23dhz7Mbj39bBxe3ZeDNu9HnTSqYvHNRyqCkeUMJpHyQweqjGUJ1DSfFYr33J1E7MkhMnEi1o7trqWjVix32XLetYfePG73yvHbS24837L7Q64i5n1LSpd9yMiQZ3Dyaysi5y6jPx7TpAvnSqBFtuCciKoNzaXoA3dqt9cuVFZTXzdXKqdt3cXcVJMNxY8RvKPVQHhUur94Lpo1nSpxf7BN5a5rHrbZFqoZszsZmiWikYPkLX72XUdw6NWjLrTBxSy7KuPYH86c6udPEXLo2xgN6XHMBMBJzt8FqqK7EcpNUBkuHm2AtpGkf9CABY3oSjDQoRF5n4vNLd3qUaxNsG4XJ12L9gJ7GrK273BxkfEA8fDdxPrb1gpespbgEnCTuZHqj1A"}}';
        $response = GetReserveProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCheckReserveProof()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"good":true,"spent":0,"total":100000000000}}';
        $response = CheckReserveProofResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetTransfers()
    {
        $jsonResponse = 'null';
        $response = GetTransfersResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetTransferByTxid()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"transfer":{"address":"53zii2WaqQwZU4oUsCUcrHgaSv2CrUGCSFJLdQnkLPyH7ZLPYHjtoHhi14dqjF6jywNRknYLwbate2eGv8TuZcS7GuR7wMY","amount":100000000000,"amounts":[100000000000],"confirmations":19,"double_spend_seen":false,"fee":53840000,"height":1140109,"locked":false,"note":"","payment_id":"0000000000000000","subaddr_index":{"major":0,"minor":0},"subaddr_indices":[{"major":0,"minor":0}],"suggested_confirmations_threshold":1,"timestamp":1658360753,"txid":"765f7124d01bd2eb2d4e7e59aa44a28c24339a41e4009f463955b087017b0ca3","type":"in","unlock_time":0},"transfers":[{"address":"53zii2WaqQwZU4oUsCUcrHgaSv2CrUGCSFJLdQnkLPyH7ZLPYHjtoHhi14dqjF6jywNRknYLwbate2eGv8TuZcS7GuR7wMY","amount":100000000000,"amounts":[100000000000],"confirmations":19,"double_spend_seen":false,"fee":53840000,"height":1140109,"locked":false,"note":"","payment_id":"0000000000000000","subaddr_index":{"major":0,"minor":0},"subaddr_indices":[{"major":0,"minor":0}],"suggested_confirmations_threshold":1,"timestamp":1658360753,"txid":"765f7124d01bd2eb2d4e7e59aa44a28c24339a41e4009f463955b087017b0ca3","type":"in","unlock_time":0}]}}';
        $response = GetTransferByTxidResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testDescribeTransfer()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"desc":[{"amount_in":886489038634812,"amount_out":886455352051344,"change_address":"5BqWeZrK944YesCy5VdmBneWeaSZutEijFVAKjpVHeVd4unsCSM55CjgViQsK9WFNHK1eZgcCuZ3fRqYpzKDokqSUmQfJzvswQs13AAidJ","change_amount":4976287087263,"dummy_outputs":0,"extra":"01b998f16459bcbac9c92074d3128d10724f10b74f5a7b1ec8e5a1e7f1150544020209010000000000000000","fee":33686583468,"payment_id":"0000000000000000000000000000000000000000000000000000000000000000","recipients":[{"address":"0b057f69acc1552014cb157138e5c4dd495347d333f68ff0af70494b979aed10","amount":881479064964081}],"ring_size":11,"unlock_time":0}]}}';
        $response = DescribeTransferResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSign()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"signature":"SigV14K6G151gycjiGxjQ74tKX6A2LwwghvuHjcDeuRFQio5LS6Gb27BNxjYQY1dPuUvXkEbGQUkiHSVLPj4nJAHRrrw3"}}';
        $response = SignResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testVerify()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"good":true}}';
        $response = VerifyResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testExportOutputs()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"outputs_data_hex":"...outputs..."}}';
        $response = ExportOutputsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testImportOutputs()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"num_imported":6400}}';
        $response = ImportOutputsResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testExportKeyImages()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"signed_key_images":[{"key_image":"cd35239b72a35e26a57ed17400c0b66944a55de9d5bda0f21190fed17f8ea876","signature":"c9d736869355da2538ab4af188279f84138c958edbae3c5caf388a63cd8e780b8c5a1aed850bd79657df659422c463608ea4e0c730ba9b662c906ae933816d00"},{"key_image":"65158a8ee5a3b32009b85a307d85b375175870e560e08de313531c7dbbe6fc19","signature":"c96e40d09dfc45cfc5ed0b76bfd7ca793469588bb0cf2b4d7b45ef23d40fd4036057b397828062e31700dc0c2da364f50cd142295a8405b9fe97418b4b745d0c"}]}}';
        $response = ExportKeyImagesResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testImportKeyImages()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"height":76428,"spent":62708953408711,"unspent":0}}';
        $response = ImportKeyImagesResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testMakeUri()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"uri":"monero:55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt?tx_payment_id=420fa29b2d9a49f5&tx_amount=0.000000000010&recipient_name=el00ruobuob%20Stagenet%20wallet&tx_description=Testing%20out%20the%20make_uri%20function."}}';
        $response = MakeUriResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testParseUri()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"uri":{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","amount":10,"payment_id":"420fa29b2d9a49f5","recipient_name":"el00ruobuob Stagenet wallet","tx_description":"Testing out the make_uri function."}}}';
        $response = ParseUriResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetAddressBook()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"entries":[{"address":"77Vx9cs1VPicFndSVgYUvTdLCJEZw9h81hXLMYsjBCXSJfUehLa9TDW3Ffh45SQa7xb6dUs18mpNxfUhQGqfwXPSMrvKhVp","description":"Second account","index":0,"payment_id":"0000000000000000000000000000000000000000000000000000000000000000"},{"address":"78P16M3XmFRGcWFCcsgt1WcTntA1jzcq31seQX1Eg92j8VQ99NPivmdKam4J5CKNAD7KuNWcq5xUPgoWczChzdba5WLwQ4j","description":"Third account","index":1,"payment_id":"0000000000000000000000000000000000000000000000000000000000000000"}]}}';
        $response = GetAddressBookResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testAddAddressBook()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"index":1}}';
        $response = AddAddressBookResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testEditAddressBook()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = EditAddressBookResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testDeleteAddressBook()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = DeleteAddressBookResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testRefresh()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"blocks_fetched":24,"received_money":true}}';
        $response = RefreshResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testAutoRefresh()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = AutoRefreshResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testRescanSpent()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = RescanSpentResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testStartMining()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = StartMiningResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testStopMining()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = StopMiningResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGetLanguages()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"languages":["Deutsch","English","Espa\u00f1ol","Fran\u00e7ais","Italiano","Nederlands","Portugu\u00eas","\u0440\u0443\u0441\u0441\u043a\u0438\u0439 \u044f\u0437\u044b\u043a","\u65e5\u672c\u8a9e","\u7b80\u4f53\u4e2d\u6587 (\u4e2d\u56fd)","Esperanto","Lojban"]}}';
        $response = GetLanguagesResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCreateWallet()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = CreateWalletResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testGenerateFromKeys()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"42gt8cXJSHAL4up8XoZh7fikVuswDU7itAoaCjSQyo6fFoeTQpAcAwrQ1cs8KvFynLFSBdabhmk7HEe3HS7UsAz4LYnVPYM","info":"Wallet has been generated successfully."}}';
        $response = GenerateFromKeysResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testOpenWallet()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = OpenWalletResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testRestoreDeterministicWallet()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"9wB1Jc5fy5hjTkFBnv4UNY3WfhUswhx8M7uWjZrwRBzH2uatJcn8AqiKEHWuSNrnapApCzzTxP4iSiV3y3pqYcRbDHNboJK","info":"Wallet has been restored successfully.","seed":"awkward vogue odometer amply bagpipe kisses poker aspire slug eluded hydrogen selfish later toolbox enigma wolf tweezers eluded gnome soprano ladder broken jukebox lordship aspire","was_deprecated":false}}';
        $response = RestoreDeterministicWalletResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testCloseWallet()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = CloseWalletResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testChangeWalletPassword()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = ChangeWalletPasswordResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testIsMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"multisig":false,"ready":false,"threshold":0,"total":0}}';
        $response = IsMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testPrepareMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"multisig_info":"MultisigV1BFdxQ653cQHB8wsj9WJQd2VdnjxK89g5M94dKPBNw22reJnyJYKrz6rJeXdjFwJ3Mz6n4qNQLd6eqUZKLiNzJFi3UPNVcTjtkG2aeSys9sYkvYYKMZ7chCxvoEXVgm74KKUcUu4V8xveCBFadFuZs8shnxBWHbcwFr5AziLr2mE7KHJT"}}';
        $response = PrepareMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testMakeMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"55SoZTKH7D39drxfgT62k8T4adVFjmDLUXnbzEKYf1MoYwnmTNKKaqGfxm4sqeKCHXQ5up7PVxrkoeRzXu83d8xYURouMod","multisig_info":""}}';
        $response = MakeMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testExportMultisigInfo()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"info":"4d6f6e65726f206d756c7469736967206578706f72740105cf6442b09b75f5eca9d846771fe1a879c9a97ab0553ffbcec64b1148eb7832b51e7898d7944c41cee000415c5a98f4f80dc0efdae379a98805bb6eacae743446f6f421cd03e129eb5b27d6e3b73eb6929201507c1ae706c1a9ecd26ac8601932415b0b6f49cbbfd712e47d01262c59980a8f9a8be776f2bf585f1477a6df63d6364614d941ecfdcb6e958a390eb9aa7c87f056673d73bc7c5f0ab1f74a682e902e48a3322c0413bb7f6fd67404f13fb8e313f70a0ce568c853206751a334ef490068d3c8ca0e"}}';
        $response = ExportMultisigInfoResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testImportMultisigInfo()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"n_outputs":35}}';
        $response = ImportMultisigInfoResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testFinalizeMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"5B9gZUTDuHTcGGuY3nL3t8K2tDnEHeRVHSBQgLZUTQxtFYVLnho5JJjWJyFp5YZgZRQ44RiviJi1sPHgLVMbckRsDqDx1gV"}}';
        $response = FinalizeMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSignMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"tx_data_hex":"...multisig_txset...","tx_hash_list":["4996091b61c1be112c1097fd5e97d8ff8b28f0e5e62e1137a8c831bacf034f2d"]}}';
        $response = SignMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testSubmitMultisig()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"tx_hash_list":["4996091b61c1be112c1097fd5e97d8ff8b28f0e5e62e1137a8c831bacf034f2d"]}}';
        $response = SubmitMultisigResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testGetVersion()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"version":65539}}';
        $response = GetVersionResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testFreeze()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = FreezeResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testFrozen()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"frozen":true}}';
        $response = FrozenResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testThaw()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{}}';
        $response = ThawResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson(JSON_FORCE_OBJECT));
    }


    public function testExchangeMultisigKeys()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"address":"55TZyExQSnbiTrJCrgZZucFAmvfyaKK9vMca7tNmzP3NLdykxBrYvdsWPQbM7aw52HQ4VsvBxJDKuKGuuaTZw8DqFdhsJrL","multisig_info":"MultisigxV2Rn1LVZfU8ySEo1APrEQz2G5jYLLyEabZ8a2KK7C4uak9KT7wCdTjztLy8A9XUiregzXU5STWvNJwuDURA7zuw7wLQxcYaJctpXt1pCUmPQnciHoNd8NcxvYKUCbeAnER2UGcrQFYwrX9ftXLb5mSrfRQ6ieL1PUSfvcw5kV8LCTQvpc5FqMaX5LHU196NDTwEmD9UkYnjgsmgFpGR5ZPpMUr6ky56vHyH"}}';
        $response = ExchangeMultisigKeysResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }


    public function testEstimateTxSizeAndWeight()
    {
        $jsonResponse = '{"id":"0","jsonrpc":"2.0","result":{"size":1630,"weight":1630}}';
        $response = EstimateTxSizeAndWeightResponse::fromJsonString($jsonResponse, "result");
        $responseFlat = json_encode(json_decode($jsonResponse)->result);
        $this->assertSame($responseFlat, $response->toJson());
    }
}
