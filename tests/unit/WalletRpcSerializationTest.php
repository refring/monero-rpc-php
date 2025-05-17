<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\unit;

use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\Enum\SignatureType;
use RefRing\MoneroRpcPhp\Enum\TransferPriority;
use RefRing\MoneroRpcPhp\Model\Address;
use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\WalletRpc\AddAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\AutoRefreshRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ChangeWalletPasswordRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckReserveProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckSpendProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CheckTxProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CloseWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAccountRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\CreateWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\DeleteAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\DescribeTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\EditAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\EstimateTxSizeAndWeightRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExchangeMultisigKeysRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportKeyImagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportMultisigInfoRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ExportOutputsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FinalizeMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FreezeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\FrozenRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GenerateFromKeysRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAccountTagsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressBookRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressIndexRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetAttributeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetBalanceRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetBulkPaymentsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetHeightRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetLanguagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetPaymentsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetReserveProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetSpendProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransferByTxidRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTransfersRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxNotesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetTxProofRequest;
use RefRing\MoneroRpcPhp\WalletRpc\GetVersionRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportKeyImagesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportMultisigInfoRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ImportOutputsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\IncomingTransfersRequest;
use RefRing\MoneroRpcPhp\WalletRpc\IsMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAccountRequest;
use RefRing\MoneroRpcPhp\WalletRpc\LabelAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeIntegratedAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\MakeUriRequest;
use RefRing\MoneroRpcPhp\WalletRpc\Model\Destination;
use RefRing\MoneroRpcPhp\WalletRpc\Model\IncomingTransferType;
use RefRing\MoneroRpcPhp\WalletRpc\Model\QueryKeyType;
use RefRing\MoneroRpcPhp\WalletRpc\Model\SignedKeyImage;
use RefRing\MoneroRpcPhp\WalletRpc\Model\SubAddressIndex;
use RefRing\MoneroRpcPhp\WalletRpc\OpenWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ParseUriRequest;
use RefRing\MoneroRpcPhp\WalletRpc\PrepareMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\QueryKeyRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RefreshRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RelayTxRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RescanBlockchainRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RescanSpentRequest;
use RefRing\MoneroRpcPhp\WalletRpc\RestoreDeterministicWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetAccountTagDescriptionRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetAttributeRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetDaemonRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SetTxNotesRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SignTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SplitIntegratedAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StartMiningRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StopMiningRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StopWalletRequest;
use RefRing\MoneroRpcPhp\WalletRpc\StoreRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitMultisigRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SubmitTransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepAllRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepDustRequest;
use RefRing\MoneroRpcPhp\WalletRpc\SweepSingleRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TagAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ThawRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TransferRequest;
use RefRing\MoneroRpcPhp\WalletRpc\TransferSplitRequest;
use RefRing\MoneroRpcPhp\WalletRpc\UntagAccountsRequest;
use RefRing\MoneroRpcPhp\WalletRpc\ValidateAddressRequest;
use RefRing\MoneroRpcPhp\WalletRpc\VerifyRequest;

class WalletRpcSerializationTest extends TestCase
{
    public function testSetDaemon()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"set_daemon","params":{"address":"http:\/\/localhost:18081","trusted":true,"ssl_support":"enabled","ssl_private_key_path":"path\/to\/ssl\/key","ssl_certificate_path":"path\/to\/ssl\/certificate","ssl_ca_file":"path\/to\/ssl\/ca\/file","ssl_allowed_fingerprints":["85:A7:68:29:BE:73:49:80:84:91:7A:BB:1F:F1:AD:7E:43:FE:CC:B8"],"ssl_allow_any_cert":true,"proxy":"myproxy"}}';
        $address = 'http://localhost:18081';
        $trusted = true;
        $sslSupport = 'enabled';
        $sslPrivateKeyPath = 'path/to/ssl/key';
        $sslCertificatePath = 'path/to/ssl/certificate';
        $sslCaFile = 'path/to/ssl/ca/file';
        $sslAllowedFingerprints = ["85:A7:68:29:BE:73:49:80:84:91:7A:BB:1F:F1:AD:7E:43:FE:CC:B8"];
        $sslAllowAnyCert = true;
        $proxy = "myproxy";
        $request = SetDaemonRequest::create($address, $trusted, $sslSupport, $sslPrivateKeyPath, $sslCertificatePath, $sslCaFile, $sslAllowedFingerprints, $sslAllowAnyCert, null, null, $proxy);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBalance()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_balance","params":{"account_index":0,"address_indices":[0,1]}}';
        $request = GetBalanceRequest::create(0, [0,1]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_address","params":{"account_index":0,"address_index":[0,1,4]}}';
        $request = GetAddressRequest::create(0, [0,1,4]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAddressIndex()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_address_index","params":{"address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o"}}';
        $request = GetAddressIndexRequest::create(new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o'));
        $this->assertSame($expected, $request->toJson());
    }


    public function testCreateAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"create_address","params":{"account_index":0,"label":"new-subs","count":2}}';
        $request = CreateAddressRequest::create(0, 'new-subs', 2);
        $this->assertSame($expected, $request->toJson());
    }


    public function testLabelAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"label_address","params":{"index":{"major":0,"minor":5},"label":"myLabel"}}';
        $subAddrIndex = new SubAddressIndex(0, 5);
        $request = LabelAddressRequest::create($subAddrIndex, 'myLabel');
        $this->assertSame($expected, $request->toJson());
    }


    public function testValidateAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"validate_address","params":{"address":"42go2d3XqA9Mx4HjZoqr93BHspcMxwAUBivs3yJKV1FyTycEcbgjNyEaGNEcgnUE9DDDAXNanzB16YgMt88Sa8cFSm2QcHK","any_net_type":true,"allow_openalias":true}}';
        $address = new Address('42go2d3XqA9Mx4HjZoqr93BHspcMxwAUBivs3yJKV1FyTycEcbgjNyEaGNEcgnUE9DDDAXNanzB16YgMt88Sa8cFSm2QcHK');
        $request = ValidateAddressRequest::create($address, true, true);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAccounts()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_accounts","params":{"tag":"myTag"}}';
        $request = GetAccountsRequest::create('myTag');
        $this->assertSame($expected, $request->toJson());
    }


    public function testCreateAccount()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"create_account","params":{"label":"Secondary account"}}';
        $request = CreateAccountRequest::create('Secondary account');
        $this->assertSame($expected, $request->toJson());
    }


    public function testLabelAccount()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"label_account","params":{"account_index":0,"label":"Primary account"}}';
        $request = LabelAccountRequest::create(0, 'Primary account');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAccountTags()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_account_tags"}';
        $request = GetAccountTagsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testTagAccounts()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"tag_accounts","params":{"tag":"myTag","accounts":[0,1]}}';
        $request = TagAccountsRequest::create('myTag', [0,1]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testUntagAccounts()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"untag_accounts","params":{"accounts":[1]}}';
        $request = UntagAccountsRequest::create([1]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSetAccountTagDescription()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"set_account_tag_description","params":{"tag":"myTag","description":"Test tag"}}';
        $request = SetAccountTagDescriptionRequest::create('myTag', 'Test tag');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetHeight()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_height"}';
        $request = GetHeightRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testTransfer()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"transfer","params":{"destinations":[{"amount":100000000000,"address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o"},{"amount":200000000000,"address":"75sNpRwUtekcJGejMuLSGA71QFuK1qcCVLZnYRTfQLgFU5nJ7xiAHtR5ihioS53KMe8pBhH61moraZHyLoG4G7fMER8xkNv"}],"account_index":0,"subaddr_indices":[0],"priority":0,"ring_size":7,"get_tx_key":true}}';
        $destinations = [
            new Destination(new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o'), new Amount('100000000000')),
            new Destination('75sNpRwUtekcJGejMuLSGA71QFuK1qcCVLZnYRTfQLgFU5nJ7xiAHtR5ihioS53KMe8pBhH61moraZHyLoG4G7fMER8xkNv', new Amount('200000000000'))
        ];
        $accountIndex = 0;
        $subaddrIndices = [0];
        $priority = TransferPriority::DEFAULT;
        $ringSize = 7;
        $getTxKey = true;

        $request = TransferRequest::create($destinations, $accountIndex, $subaddrIndices, $priority, null, $ringSize, null, $getTxKey);
        $this->assertSame($expected, $request->toJson());
    }


    public function testTransferSplit()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"transfer_split","params":{"destinations":[{"amount":1000000000000,"address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o"},{"amount":2000000000000,"address":"75sNpRwUtekcJGejMuLSGA71QFuK1qcCVLZnYRTfQLgFU5nJ7xiAHtR5ihioS53KMe8pBhH61moraZHyLoG4G7fMER8xkNv"}],"account_index":0,"subaddr_indices":[0],"ring_size":7,"get_tx_keys":true,"priority":0}}';

        $destinations = [
            new Destination('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o', new Amount(1000000000000)),
            new Destination('75sNpRwUtekcJGejMuLSGA71QFuK1qcCVLZnYRTfQLgFU5nJ7xiAHtR5ihioS53KMe8pBhH61moraZHyLoG4G7fMER8xkNv', new Amount(2000000000000))
        ];
        $accountIndex = 0;
        $subaddrIndices = [0];
        $priority = TransferPriority::DEFAULT;
        $ringSize = 7;
        $getTxKey = true;

        $request = TransferSplitRequest::create($destinations, $accountIndex, $subaddrIndices, $ringSize, null, null, $getTxKey, $priority);

        $json = $request->toJson();
        $this->assertSame($expected, $json);
    }


    public function testSignTransfer()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sign_transfer","params":{"unsigned_txset":"...long_hex..."}}';
        $request = SignTransferRequest::create('...long_hex...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testSubmitTransfer()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"submit_transfer","params":{"tx_data_hex":"...long_hex..."}}';
        $request = SubmitTransferRequest::create('...long_hex...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testSweepDust()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sweep_dust","params":{"get_tx_keys":true}}';
        $request = SweepDustRequest::create(true);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSweepAll()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sweep_all","params":{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","subaddr_indices":[4],"get_tx_keys":true}}';
        $address = new Address('55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt');
        $request = SweepAllRequest::create($address, subaddrIndices: [4], getTxKeys: true);
        $this->assertSame($expected, $request->toJson());
    }

    public function testSweepSingle()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sweep_single","params":{"address":"74Jsocx8xbpTBEjm3ncKE5LBQbiJouyCDaGhgSiebpvNDXZnTAbW2CmUR5SsBeae2pNk9WMVuz6jegkC4krUyqRjA6VjoLD","get_tx_key":true,"key_image":"a7834459ef795d2efb6f665d2fd758c8d9288989d8d4c712a68f8023f7804a5e"}}';
        $address = new Address('74Jsocx8xbpTBEjm3ncKE5LBQbiJouyCDaGhgSiebpvNDXZnTAbW2CmUR5SsBeae2pNk9WMVuz6jegkC4krUyqRjA6VjoLD');
        $request = SweepSingleRequest::create($address, keyImage: 'a7834459ef795d2efb6f665d2fd758c8d9288989d8d4c712a68f8023f7804a5e', getTxKey: true);
        $this->assertSame($expected, $request->toJson());
    }

    public function testRelayTx()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"relay_tx","params":{"hex":"...tx_metadata..."}}';
        $request = RelayTxRequest::create('...tx_metadata...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testStore()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"store"}';
        $request = StoreRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetPayments()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_payments","params":{"payment_id":"60900e5603bf96e3"}}';
        $request = GetPaymentsRequest::create('60900e5603bf96e3');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetBulkPayments()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_bulk_payments","params":{"payment_ids":["60900e5603bf96e3"],"min_block_height":120000}}';
        $request = GetBulkPaymentsRequest::create(['60900e5603bf96e3'], 120000);
        $this->assertSame($expected, $request->toJson());
    }


    public function testIncomingTransfers()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"incoming_transfers","params":{"transfer_type":"all","account_index":0,"subaddr_indices":[3]}}';
        $request = IncomingTransfersRequest::create(IncomingTransferType::ALL, 0, [3]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testQueryKey()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"query_key","params":{"key_type":"view_key"}}';
        $request = QueryKeyRequest::create(QueryKeyType::VIEW_KEY);
        $this->assertSame($expected, $request->toJson());
    }


    public function testMakeIntegratedAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"make_integrated_address","params":{"standard_address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt"}}';
        $standardAddress = '55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt';
        $request = MakeIntegratedAddressRequest::create($standardAddress);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSplitIntegratedAddress()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"split_integrated_address","params":{"integrated_address":"5F38Rw9HKeaLQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZXCkbHUXdPHyiUeRyokn"}}';
        $integratedAddress = '5F38Rw9HKeaLQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZXCkbHUXdPHyiUeRyokn';
        $request = SplitIntegratedAddressRequest::create($integratedAddress);
        $this->assertSame($expected, $request->toJson());
    }


    public function testStopWallet()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"stop_wallet"}';
        $request = StopWalletRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testRescanBlockchain()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"rescan_blockchain"}';
        $request = RescanBlockchainRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testSetTxNotes()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"set_tx_notes","params":{"txids":["3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f"],"notes":["This is an example"]}}';
        $txids = ['3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f'];
        $notes = ['This is an example'];
        $request = SetTxNotesRequest::create($txids, $notes);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTxNotes()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_tx_notes","params":{"txids":["3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f"]}}';
        $txids = ['3292e83ad28fc1cc7bc26dbd38862308f4588680fbf93eae3e803cddd1bd614f'];
        $request = GetTxNotesRequest::create($txids);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSetAttribute()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"set_attribute","params":{"key":"my_attribute","value":"my_value"}}';
        $request = SetAttributeRequest::create('my_attribute', 'my_value');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAttribute()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_attribute","params":{"key":"my_attribute"}}';
        $request = GetAttributeRequest::create('my_attribute');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTxKey()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_tx_key","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $request = GetTxKeyRequest::create($txid);
        $this->assertSame($expected, $request->toJson());
    }


    public function testCheckTxKey()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"check_tx_key","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be","tx_key":"feba662cf8fb6d0d0da18fc9b70ab28e01cc76311278fdd7fe7ab16360762b06","address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $txKey = 'feba662cf8fb6d0d0da18fc9b70ab28e01cc76311278fdd7fe7ab16360762b06';
        $address = new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o');
        $request = CheckTxKeyRequest::create($txid, $txKey, $address);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTxProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_tx_proof","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be","address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o","message":"this is my transaction"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $address = new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o');
        $message = 'this is my transaction';
        $request = GetTxProofRequest::create($txid, $address, $message);
        $this->assertSame($expected, $request->toJson());
    }


    public function testCheckTxProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"check_tx_proof","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be","address":"7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o","signature":"InProofV13vqBCT6dpSAXkypZmSEMPGVnNRFDX2vscUYeVS4WnSVnV5BwLs31T9q6Etfj9Wts6tAxSAS4gkMeSYzzLS7Gt4vvCSQRh9niGJMUDJsB5hTzb2XJiCkUzWkkcjLFBBRVD5QZ","message":"this is my transaction"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $address = new Address('7BnERTpvL5MbCLtj5n9No7J5oE5hHiB3tVCK5cjSvCsYWD2WRJLFuWeKTLiXo5QJqt2ZwUaLy2Vh1Ad51K7FNgqcHgjW85o');
        $message = 'this is my transaction';
        $signature = 'InProofV13vqBCT6dpSAXkypZmSEMPGVnNRFDX2vscUYeVS4WnSVnV5BwLs31T9q6Etfj9Wts6tAxSAS4gkMeSYzzLS7Gt4vvCSQRh9niGJMUDJsB5hTzb2XJiCkUzWkkcjLFBBRVD5QZ';
        $request = CheckTxProofRequest::create($txid, $address, $signature, $message);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetSpendProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_spend_proof","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be","message":"this is my transaction"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $message = 'this is my transaction';
        $request = GetSpendProofRequest::create($txid, $message);
        $this->assertSame($expected, $request->toJson());
    }


    public function testCheckSpendProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"check_spend_proof","params":{"txid":"19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be","signature":"SpendProofV1aSh8Todhk54736iXgV6vJAFP7egxByuMWZeyNDaN2JY737S95X5zz5mNMQSuCNSLjjhi5HJCsndpNWSNVsuThxwv285qy1KkUrLFRkxMSCjfL6bbycYN33ScZ5UB4Fzseceo1ndpL393T1q638VmcU3a56dhNHF1RPZFiGPS61FA78nXFSqE9uoKCCoHkEz83M1dQVhxZV5CEPF2P6VioGTKgprLCH9vvj9k1ivd4SX19L2VSMc3zD1u3mkR24ioETvxBoLeBSpxMoikyZ6inhuPm8yYo9YWyFtQK4XYfAV9mJ9knz5fUPXR8vvh7KJCAg4dqeJXTVb4mbMzYtsSZXHd6ouWoyCd6qMALdW8pKhgMCHcVYMWp9X9WHZuCo9rsRjRpg15sJUw7oJg1JoGiVgj8P4JeGDjnZHnmLVa5bpJhVCbMhyM7JLXNQJzFWTGC27TQBbthxCfQaKdusYnvZnKPDJWSeceYEFzepUnsWhQtyhbb73FzqgWC4eKEFKAZJqT2LuuSoxmihJ9acnFK7Ze23KTVYgDyMKY61VXADxmSrBvwUtxCaW4nQtnbMxiPMNnDMzeixqsFMBtN72j5UqhiLRY99k6SE7Qf5f29haNSBNSXCFFHChPKNTwJrehkofBdKUhh2VGPqZDNoefWUwfudeu83t85bmjv8Q3LrQSkFgFjRT5tLo8TMawNXoZCrQpyZrEvnodMDDUUNf3NL7rxyv3gM1KrTWjYaWXFU2RAsFee2Q2MTwUW7hR25cJvSFuB1BX2bfkoCbiMk923tHZGU2g7rSKF1GDDkXAc1EvFFD4iGbh1Q5t6hPRhBV8PEncdcCWGq5uAL5D4Bjr6VXG8uNeCy5oYWNgbZ5JRSfm7QEhPv8Fy9AKMgmCxDGMF9dVEaU6tw2BAnJavQdfrxChbDBeQXzCbCfep6oei6n2LZdE5Q84wp7eoQFE5Cwuo23tHkbJCaw2njFi3WGBbA7uGZaGHJPyB2rofTWBiSUXZnP2hiE9bjJghAcDm1M4LVLfWvhZmFEnyeru3VWMETnetz1BYLUC5MJGFXuhnHwWh7F6r74FDyhdswYop4eWPbyrXMXmUQEccTGd2NaT8g2VHADZ76gMC6BjWESvcnz2D4n8XwdmM7ZQ1jFwhuXrBfrb1dwRasyXxxHMGAC2onatNiExyeQ9G1W5LwqNLAh9hvcaNTGaYKYXoceVzLkgm6e5WMkLsCwuZXvB","message":"this is my transaction"}}';
        $txid = '19d5089f9469db3d90aca9024dfcb17ce94b948300101c8345a5e9f7257353be';
        $message = 'this is my transaction';
        $signature = 'SpendProofV1aSh8Todhk54736iXgV6vJAFP7egxByuMWZeyNDaN2JY737S95X5zz5mNMQSuCNSLjjhi5HJCsndpNWSNVsuThxwv285qy1KkUrLFRkxMSCjfL6bbycYN33ScZ5UB4Fzseceo1ndpL393T1q638VmcU3a56dhNHF1RPZFiGPS61FA78nXFSqE9uoKCCoHkEz83M1dQVhxZV5CEPF2P6VioGTKgprLCH9vvj9k1ivd4SX19L2VSMc3zD1u3mkR24ioETvxBoLeBSpxMoikyZ6inhuPm8yYo9YWyFtQK4XYfAV9mJ9knz5fUPXR8vvh7KJCAg4dqeJXTVb4mbMzYtsSZXHd6ouWoyCd6qMALdW8pKhgMCHcVYMWp9X9WHZuCo9rsRjRpg15sJUw7oJg1JoGiVgj8P4JeGDjnZHnmLVa5bpJhVCbMhyM7JLXNQJzFWTGC27TQBbthxCfQaKdusYnvZnKPDJWSeceYEFzepUnsWhQtyhbb73FzqgWC4eKEFKAZJqT2LuuSoxmihJ9acnFK7Ze23KTVYgDyMKY61VXADxmSrBvwUtxCaW4nQtnbMxiPMNnDMzeixqsFMBtN72j5UqhiLRY99k6SE7Qf5f29haNSBNSXCFFHChPKNTwJrehkofBdKUhh2VGPqZDNoefWUwfudeu83t85bmjv8Q3LrQSkFgFjRT5tLo8TMawNXoZCrQpyZrEvnodMDDUUNf3NL7rxyv3gM1KrTWjYaWXFU2RAsFee2Q2MTwUW7hR25cJvSFuB1BX2bfkoCbiMk923tHZGU2g7rSKF1GDDkXAc1EvFFD4iGbh1Q5t6hPRhBV8PEncdcCWGq5uAL5D4Bjr6VXG8uNeCy5oYWNgbZ5JRSfm7QEhPv8Fy9AKMgmCxDGMF9dVEaU6tw2BAnJavQdfrxChbDBeQXzCbCfep6oei6n2LZdE5Q84wp7eoQFE5Cwuo23tHkbJCaw2njFi3WGBbA7uGZaGHJPyB2rofTWBiSUXZnP2hiE9bjJghAcDm1M4LVLfWvhZmFEnyeru3VWMETnetz1BYLUC5MJGFXuhnHwWh7F6r74FDyhdswYop4eWPbyrXMXmUQEccTGd2NaT8g2VHADZ76gMC6BjWESvcnz2D4n8XwdmM7ZQ1jFwhuXrBfrb1dwRasyXxxHMGAC2onatNiExyeQ9G1W5LwqNLAh9hvcaNTGaYKYXoceVzLkgm6e5WMkLsCwuZXvB';
        $request = CheckSpendProofRequest::create($txid, $signature, $message);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetReserveProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_reserve_proof","params":{"all":false,"account_index":0,"amount":100000000000}}';
        $request = GetReserveProofRequest::create(false, 0, new Amount(100000000000));
        $this->assertSame($expected, $request->toJson());
    }


    public function testCheckReserveProof()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"check_reserve_proof","params":{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","signature":"ReserveProofV11BZ23sBt9sZJeGccf84mzyAmNCP3KzYbE1111112VKmH111118NfCYJQjZ6c46gT2kXgcHCaSSZeL8sRdzqjqx7i1e7FQfQGu2o113UYFVdwzHQi3iENDPa76Kn1BvywbKz3bMkXdZkBEEhBSF4kjjGaiMJ1ucKb6wvMVC4A8sA4nZEdL2Mk3wBucJCYTZwKqA8i1M113kqakDkG25FrjiDqdQTCYz2wDBmfKxF3eQiV5FWzZ6HmAyxnqTWUiMWukP9A3Edy3ZXqjP1b23dhz7Mbj39bBxe3ZeDNu9HnTSqYvHNRyqCkeUMJpHyQweqjGUJ1DSfFYr33J1E7MkhMnEi1o7trqWjVix32XLetYfePG73yvHbS24837L7Q64i5n1LSpd9yMiQZ3Dyaysi5y6jPx7TpAvnSqBFtuCciKoNzaXoA3dqt9cuVFZTXzdXKqdt3cXcVJMNxY8RvKPVQHhUur94Lpo1nSpxf7BN5a5rHrbZFqoZszsZmiWikYPkLX72XUdw6NWjLrTBxSy7KuPYH86c6udPEXLo2xgN6XHMBMBJzt8FqqK7EcpNUBkuHm2AtpGkf9CABY3oSjDQoRF5n4vNLd3qUaxNsG4XJ12L9gJ7GrK273BxkfEA8fDdxPrb1gpespbgEnCTuZHqj1A"}}';
        $address = new Address('55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt');
        $request = CheckReserveProofRequest::create($address, 'ReserveProofV11BZ23sBt9sZJeGccf84mzyAmNCP3KzYbE1111112VKmH111118NfCYJQjZ6c46gT2kXgcHCaSSZeL8sRdzqjqx7i1e7FQfQGu2o113UYFVdwzHQi3iENDPa76Kn1BvywbKz3bMkXdZkBEEhBSF4kjjGaiMJ1ucKb6wvMVC4A8sA4nZEdL2Mk3wBucJCYTZwKqA8i1M113kqakDkG25FrjiDqdQTCYz2wDBmfKxF3eQiV5FWzZ6HmAyxnqTWUiMWukP9A3Edy3ZXqjP1b23dhz7Mbj39bBxe3ZeDNu9HnTSqYvHNRyqCkeUMJpHyQweqjGUJ1DSfFYr33J1E7MkhMnEi1o7trqWjVix32XLetYfePG73yvHbS24837L7Q64i5n1LSpd9yMiQZ3Dyaysi5y6jPx7TpAvnSqBFtuCciKoNzaXoA3dqt9cuVFZTXzdXKqdt3cXcVJMNxY8RvKPVQHhUur94Lpo1nSpxf7BN5a5rHrbZFqoZszsZmiWikYPkLX72XUdw6NWjLrTBxSy7KuPYH86c6udPEXLo2xgN6XHMBMBJzt8FqqK7EcpNUBkuHm2AtpGkf9CABY3oSjDQoRF5n4vNLd3qUaxNsG4XJ12L9gJ7GrK273BxkfEA8fDdxPrb1gpespbgEnCTuZHqj1A', null);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTransfers()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_transfers","params":{"in":true,"out":false,"pending":false,"failed":false,"pool":false,"account_index":1}}';
        $request = GetTransfersRequest::create(in: true, accountIndex: 1);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetTransferByTxid()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_transfer_by_txid","params":{"txid":"765f7124d01bd2eb2d4e7e59aa44a28c24339a41e4009f463955b087017b0ca3"}}';
        $request = GetTransferByTxidRequest::create('765f7124d01bd2eb2d4e7e59aa44a28c24339a41e4009f463955b087017b0ca3');
        $this->assertSame($expected, $request->toJson());
    }


    public function testDescribeTransfer()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"describe_transfer","params":{"unsigned_txset":"...long hex..."}}';
        $request = DescribeTransferRequest::create('...long hex...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testSign()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sign","params":{"data":"test","account_index":0,"address_index":0,"signature_type":"spend"}}';
        $request = SignRequest::create('test', 0, 0, SignatureType::SPEND);
        $this->assertSame($expected, $request->toJson());
    }


    public function testVerify()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"verify","params":{"data":"This is sample data to be signed","address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","signature":"SigV14K6G151gycjiGxjQ74tKX6A2LwwghvuHjcDeuRFQio5LS6Gb27BNxjYQY1dPuUvXkEbGQUkiHSVLPj4nJAHRrrw3"}}';
        $data = 'This is sample data to be signed';
        $address = new Address('55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt');
        $signature = 'SigV14K6G151gycjiGxjQ74tKX6A2LwwghvuHjcDeuRFQio5LS6Gb27BNxjYQY1dPuUvXkEbGQUkiHSVLPj4nJAHRrrw3';
        $request = VerifyRequest::create($data, $address, $signature);
        $this->assertSame($expected, $request->toJson());
    }


    public function testExportOutputs()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"export_outputs"}';
        $request = ExportOutputsRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testImportOutputs()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"import_outputs","params":{"outputs_data_hex":"...outputs..."}}';
        $request = ImportOutputsRequest::create('...outputs...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testExportKeyImages()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"export_key_images"}';
        $request = ExportKeyImagesRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testImportKeyImages()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"import_key_images","params":{"signed_key_images":[{"key_image":"cd35239b72a35e26a57ed17400c0b66944a55de9d5bda0f21190fed17f8ea876","signature":"c9d736869355da2538ab4af188279f84138c958edbae3c5caf388a63cd8e780b8c5a1aed850bd79657df659422c463608ea4e0c730ba9b662c906ae933816d00"},{"key_image":"65158a8ee5a3b32009b85a307d85b375175870e560e08de313531c7dbbe6fc19","signature":"c96e40d09dfc45cfc5ed0b76bfd7ca793469588bb0cf2b4d7b45ef23d40fd4036057b397828062e31700dc0c2da364f50cd142295a8405b9fe97418b4b745d0c"}]}}';
        $signedKeyImages = [
            new SignedKeyImage('cd35239b72a35e26a57ed17400c0b66944a55de9d5bda0f21190fed17f8ea876', 'c9d736869355da2538ab4af188279f84138c958edbae3c5caf388a63cd8e780b8c5a1aed850bd79657df659422c463608ea4e0c730ba9b662c906ae933816d00'),
            new SignedKeyImage('65158a8ee5a3b32009b85a307d85b375175870e560e08de313531c7dbbe6fc19', 'c96e40d09dfc45cfc5ed0b76bfd7ca793469588bb0cf2b4d7b45ef23d40fd4036057b397828062e31700dc0c2da364f50cd142295a8405b9fe97418b4b745d0c')
        ];
        $request = ImportKeyImagesRequest::create($signedKeyImages);
        $this->assertSame($expected, $request->toJson());
    }


    public function testMakeUri()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"make_uri","params":{"address":"55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt","amount":1000000000000,"payment_id":"420fa29b2d9a49f5","recipient_name":"el00ruobuob Stagenet wallet","tx_description":"Testing out the make_uri function."}}';
        $address = new Address('55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt');
        $paymentId = '420fa29b2d9a49f5';
        $txDescription = 'Testing out the make_uri function.';
        $recipientName = 'el00ruobuob Stagenet wallet';
        $request = MakeUriRequest::create($address, Amount::fromXmr('1'), $paymentId, $recipientName, $txDescription);
        $this->assertSame($expected, $request->toJson());
    }


    public function testParseUri()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"parse_uri","params":{"uri":"monero:55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt?tx_payment_id=420fa29b2d9a49f5&tx_amount=0.000000000010&recipient_name=el00ruobuob%20Stagenet%20wallet&tx_description=Testing%20out%20the%20make_uri%20function."}}';
        $uri = 'monero:55LTR8KniP4LQGJSPtbYDacR7dz8RBFnsfAKMaMuwUNYX6aQbBcovzDPyrQF9KXF9tVU6Xk3K8no1BywnJX6GvZX8yJsXvt?tx_payment_id=420fa29b2d9a49f5&tx_amount=0.000000000010&recipient_name=el00ruobuob%20Stagenet%20wallet&tx_description=Testing%20out%20the%20make_uri%20function.';

        $request = ParseUriRequest::create($uri);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetAddressBook()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_address_book","params":{"entries":[0,1]}}';
        $request = GetAddressBookRequest::create([0,1]);
        $this->assertSame($expected, $request->toJson());
    }


    public function testAddAddressBook()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"add_address_book","params":{"address":"78P16M3XmFRGcWFCcsgt1WcTntA1jzcq31seQX1Eg92j8VQ99NPivmdKam4J5CKNAD7KuNWcq5xUPgoWczChzdba5WLwQ4j","description":"Third account"}}';
        $address = new Address('78P16M3XmFRGcWFCcsgt1WcTntA1jzcq31seQX1Eg92j8VQ99NPivmdKam4J5CKNAD7KuNWcq5xUPgoWczChzdba5WLwQ4j');
        $description = 'Third account';
        $request = AddAddressBookRequest::create($address, $description);
        $this->assertSame($expected, $request->toJson());
    }


    public function testEditAddressBook()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"edit_address_book","params":{"index":0,"set_address":true,"address":"78P16M3XmFRGcWFCcsgt1WcTntA1jzcq31seQX1Eg92j8VQ99NPivmdKam4J5CKNAD7KuNWcq5xUPgoWczChzdba5WLwQ4j","set_description":true,"description":"Example description."}}';
        $index = 0;
        $setAddress = true;
        $address = new Address('78P16M3XmFRGcWFCcsgt1WcTntA1jzcq31seQX1Eg92j8VQ99NPivmdKam4J5CKNAD7KuNWcq5xUPgoWczChzdba5WLwQ4j');
        $setPaymentId = true;
        $paymentId = '60900e5603bf96e3';
        $setDescription = true;
        $description = 'Example description.';
        $request = EditAddressBookRequest::create($index, $setAddress, $address, $setDescription, $description, $setPaymentId, $paymentId);
        $this->assertSame($expected, $request->toJson());
    }


    public function testDeleteAddressBook()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"delete_address_book","params":{"index":1}}';
        $request = DeleteAddressBookRequest::create(1);
        $this->assertSame($expected, $request->toJson());
    }


    public function testRefresh()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"refresh","params":{"start_height":100000}}';
        $request = RefreshRequest::create(100000);
        $this->assertSame($expected, $request->toJson());
    }


    public function testAutoRefresh()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"auto_refresh","params":{"enable":true,"period":10}}';
        $request = AutoRefreshRequest::create(true, 10);
        $this->assertSame($expected, $request->toJson());
    }


    public function testRescanSpent()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"rescan_spent"}';
        $request = RescanSpentRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testStartMining()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"start_mining","params":{"threads_count":1,"do_background_mining":true,"ignore_battery":false}}';
        $request = StartMiningRequest::create(1, true, false);
        $this->assertSame($expected, $request->toJson());
    }


    public function testStopMining()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"stop_mining"}';
        $request = StopMiningRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetLanguages()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_languages"}';
        $request = GetLanguagesRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testCreateWallet()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"create_wallet","params":{"filename":"mytestwallet","password":"mytestpassword","language":"English"}}';
        $filename = 'mytestwallet';
        $password = 'mytestpassword';
        $language = 'English';
        $request = CreateWalletRequest::create($filename, $language, $password);
        $this->assertSame($expected, $request->toJson());
    }


    public function testGenerateFromKeys()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"generate_from_keys","params":{"restore_height":0,"filename":"wallet_name","address":"42gt8cXJSHAL4up8XoZh7fikVuswDU7itAoaCjSQyo6fFoeTQpAcAwrQ1cs8KvFynLFSBdabhmk7HEe3HS7UsAz4LYnVPYM","spendkey":"11d3fd247672c4cb29b6e38791dcf07629cd2d68d868f0b78811ce584a6b0d01","viewkey":"97cf64f2cd6c930242e9bed5f14f8f16a33047229aca3eababf4af7e8d113209","password":"pass","autosave_current":true}}';
        $restoreHeight = 0;
        $filename = 'wallet_name';
        $address = new Address('42gt8cXJSHAL4up8XoZh7fikVuswDU7itAoaCjSQyo6fFoeTQpAcAwrQ1cs8KvFynLFSBdabhmk7HEe3HS7UsAz4LYnVPYM');
        $spendkey = '11d3fd247672c4cb29b6e38791dcf07629cd2d68d868f0b78811ce584a6b0d01';
        $viewkey = '97cf64f2cd6c930242e9bed5f14f8f16a33047229aca3eababf4af7e8d113209';
        $password = 'pass';
        $autosaveCurrent = true;
        $request = GenerateFromKeysRequest::create($filename, $address, $viewkey, $password, $restoreHeight, $spendkey, $autosaveCurrent);
        $this->assertSame($expected, $request->toJson());
    }


    public function testOpenWallet()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"open_wallet","params":{"filename":"mytestwallet","password":"mytestpassword"}}';
        $request = OpenWalletRequest::create('mytestwallet', 'mytestpassword');
        $this->assertSame($expected, $request->toJson());
    }


    public function testRestoreDeterministicWallet()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"restore_deterministic_wallet","params":{"filename":"My Wallet","password":"mypassword123","seed":"awkward vogue odometer amply bagpipe kisses poker aspire slug eluded hydrogen selfish later toolbox enigma wolf tweezers eluded gnome soprano ladder broken jukebox lordship aspire","restore_height":0,"language":"English","autosave_current":true}}';
        $filename = 'My Wallet';
        $password = 'mypassword123';
        $seed = 'awkward vogue odometer amply bagpipe kisses poker aspire slug eluded hydrogen selfish later toolbox enigma wolf tweezers eluded gnome soprano ladder broken jukebox lordship aspire';
        $restoreHeight = 0;
        $language = 'English';
        $seedOffset = '';
        $autosaveCurrent = true;
        $request = RestoreDeterministicWalletRequest::create($filename, $password, $seed, $restoreHeight, $language, $seedOffset, $autosaveCurrent);
        $this->assertSame($expected, $request->toJson());
    }


    public function testCloseWallet()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"close_wallet"}';
        $request = CloseWalletRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testChangeWalletPassword()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"change_wallet_password","params":{"old_password":"theCurrentSecretPassPhrase","new_password":"theNewSecretPassPhrase"}}';
        $request = ChangeWalletPasswordRequest::create('theCurrentSecretPassPhrase', 'theNewSecretPassPhrase');
        $this->assertSame($expected, $request->toJson());
    }


    public function testIsMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"is_multisig"}';
        $request = IsMultisigRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testPrepareMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"prepare_multisig"}';
        $request = PrepareMultisigRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testMakeMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"make_multisig","params":{"multisig_info":["MultisigV1K4tGGe8QirZdHgTYoBZMumSug97fdDyM3Z63M3ZY5VXvAdoZvx16HJzPCP4Rp2ABMKUqLD2a74ugMdBfrVpKt4BwD8qCL5aZLrsYWoHiA7JJwDESuhsC3eF8QC9UMvxLXEMsMVh16o98GnKRYz1HCKXrAEWfcrCHyz3bLW1Pdggyowop"],"threshold":2}}';
        $multisigInfo = ['MultisigV1K4tGGe8QirZdHgTYoBZMumSug97fdDyM3Z63M3ZY5VXvAdoZvx16HJzPCP4Rp2ABMKUqLD2a74ugMdBfrVpKt4BwD8qCL5aZLrsYWoHiA7JJwDESuhsC3eF8QC9UMvxLXEMsMVh16o98GnKRYz1HCKXrAEWfcrCHyz3bLW1Pdggyowop'];
        $request = MakeMultisigRequest::create($multisigInfo, 2);
        $this->assertSame($expected, $request->toJson());
    }


    public function testExportMultisigInfo()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"export_multisig_info"}';
        $request = ExportMultisigInfoRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testImportMultisigInfo()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"import_multisig_info","params":{"info":["...multisig_info..."]}}';
        $request = ImportMultisigInfoRequest::create(['...multisig_info...']);
        $this->assertSame($expected, $request->toJson());
    }


    public function testFinalizeMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"finalize_multisig","params":{"multisig_info":["MultisigxV1JNC6Ja2oBt5Sqea9LN2YEF7WYZCpHqr2EKvPG89Trf3X4E8RWkLaGRf29fJ3stU471MELKxwufNYeigP7LoE4tn2McPr4SbL9q15xNvZT5uwC9YRr7UwjXqSZHmTWN9PBuZEKVAQ4HPPyQciSCdNjgwsuFRBzrskMdMUwNMgKst1debYfm37i6PSzDoS2tk4kYTYj83kkAdR7kdshet1axQPd6HQ","MultisigxV1Unma7Ko4zdd8Ps3Af4oZwtj2JdWKzwNfP6s2G9ZvXhMoSscwn5g7PyCfcBc1V4ffRHY3Kxqq6VocSCUTncpVeUskMcPr4SbL9q15xNvZT5uwC9YRr7UwjXqSZHmTWN9PBuZE1LTpWxLoC3vPMSrqVVcjnmL9LYfdCZz3fECjNZbCEDq3PHDiUuY5jurQTcNoGhDTio5WM9xaAdim9YByiS5KyqF4"]}}';
        $multisigInfo = [
            'MultisigxV1JNC6Ja2oBt5Sqea9LN2YEF7WYZCpHqr2EKvPG89Trf3X4E8RWkLaGRf29fJ3stU471MELKxwufNYeigP7LoE4tn2McPr4SbL9q15xNvZT5uwC9YRr7UwjXqSZHmTWN9PBuZEKVAQ4HPPyQciSCdNjgwsuFRBzrskMdMUwNMgKst1debYfm37i6PSzDoS2tk4kYTYj83kkAdR7kdshet1axQPd6HQ',
            'MultisigxV1Unma7Ko4zdd8Ps3Af4oZwtj2JdWKzwNfP6s2G9ZvXhMoSscwn5g7PyCfcBc1V4ffRHY3Kxqq6VocSCUTncpVeUskMcPr4SbL9q15xNvZT5uwC9YRr7UwjXqSZHmTWN9PBuZE1LTpWxLoC3vPMSrqVVcjnmL9LYfdCZz3fECjNZbCEDq3PHDiUuY5jurQTcNoGhDTio5WM9xaAdim9YByiS5KyqF4'
        ];
        $request = FinalizeMultisigRequest::create($multisigInfo);
        $this->assertSame($expected, $request->toJson());
    }


    public function testSignMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"sign_multisig","params":{"tx_data_hex":"...multisig_txset..."}}';
        $request = SignMultisigRequest::create('...multisig_txset...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testSubmitMultisig()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"submit_multisig","params":{"tx_data_hex":"...tx_data_hex..."}}';
        $request = SubmitMultisigRequest::create('...tx_data_hex...');
        $this->assertSame($expected, $request->toJson());
    }


    public function testGetVersion()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"get_version"}';
        $request = GetVersionRequest::create();
        $this->assertSame($expected, $request->toJson());
    }


    public function testFreeze()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"freeze","params":{"key_image":"d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9"}}';
        $request = FreezeRequest::create('d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9');
        $this->assertSame($expected, $request->toJson());
    }


    public function testFrozen()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"frozen","params":{"key_image":"d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9"}}';
        $request = FrozenRequest::create('d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9');
        $this->assertSame($expected, $request->toJson());
    }


    public function testThaw()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"thaw","params":{"key_image":"d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9"}}';
        $request = ThawRequest::create('d0071ab34ab7f567f9b54303ed684de6cd5ed969a6b6c4bf352d25242f0b3da9');
        $this->assertSame($expected, $request->toJson());
    }


    public function testExchangeMultisigKeys()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"exchange_multisig_keys","params":{"password":"","multisig_info":"MultisigxV2R1hSyd7Zdx5A92zWF7E9487XQg8zZRDYM6c9aNfEShmCKoUx9ftccXZvH9cRcadd5veh6mwk9sXuGzWZRo57MdvSkJi3ABLt8wZPv8FTkBqVDVcgUdXm4tS81HdJ5WQXboQJJQQd5JKoySKJ4S9xHGojL2i3VUvbWAyduaWGjMK4hrLQA1"}}';
        $password = '';
        $multisigInfo = 'MultisigxV2R1hSyd7Zdx5A92zWF7E9487XQg8zZRDYM6c9aNfEShmCKoUx9ftccXZvH9cRcadd5veh6mwk9sXuGzWZRo57MdvSkJi3ABLt8wZPv8FTkBqVDVcgUdXm4tS81HdJ5WQXboQJJQQd5JKoySKJ4S9xHGojL2i3VUvbWAyduaWGjMK4hrLQA1';
        $request = ExchangeMultisigKeysRequest::create($password, $multisigInfo);
        $this->assertSame($expected, $request->toJson());
    }


    public function testEstimateTxSizeAndWeight()
    {
        $expected = '{"jsonrpc":"2.0","id":"0","method":"estimate_tx_size_and_weight","params":{"n_inputs":1,"n_outputs":2,"ring_size":16,"rct":true}}';
        $request = EstimateTxSizeAndWeightRequest::create(1, 2, 16, true);
        $this->assertSame($expected, $request->toJson());
    }
}
