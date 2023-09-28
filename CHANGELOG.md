# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## v0.6.0 (2023-09-28)
### Added
- DaemonRpcClient::getHeight()
- Errors: IndexOutOfRangeException, InvalidAddressException, InvalidOriginalPasswordException and InvalidPaymentIdException
- Github Actions: dependabot config for keeping actions and composer deps up to date
- Github Actions: symfonycorp/security-checker-action for checking security vulnerabilities in deps
- Integration tests: addressbook methods, integrated address methods, restore_deterministic_wallet and query_key 

### Changed
- Removed DaemonOtherClient and moved methods to DaemonRpcClient
- Removed RegtestRpcClient and moved method generateblocks to DaemonRpcClient::generateBlocks()
- addAuxPow() now returns AuxPow objects instead of a generic array
- Some cosmetic changes like better and more consistent comments
- AddressBook methods no longer have paymentId
- Tests: Work with mnemonics instead of private spend keys
- Tests: NonEmptyBlockchainTest now reset the chain after running so the tests can be run again without errors

## v0.5.0 (2023-09-20)
### Added
- Support for the "other" Daemon rpc requests through DaemonOtherClient
- Support for logging
- DaemonOtherClient::popBlocks()
- DaemonOtherClient::getNetStats()
- AddressIndexOutOfBoundException
- AttributeNotFoundException
- TagNotFoundException
- KeyPairHelper for tests
- A bunch of integration tests for the wallet

### Changed
- Renamed Builder to ClientBuilder
- WalletRpcClient::validateAddress() now also takes a string as $address
- WalletRpcClient::untagAccounts() now also takes an int as $accounts

## v0.4.0 (2023-09-16)
### Added
- DaemonBaseResponse class
- RpcAccessBaseResponse class
- HardforkInformation class

### Changed
- Many changes based on core_rpc_server_commands_defs.h definitions from the main Monero repo from the main Monero repo
- WalletRpcClient::transfer() now accepts a single Recipient as well as an array of Recipient
- Connection was renamed to ConnectionInfo
- Chain was renamed to ChainInformation

## v0.3.0 (2023-09-14)
### Added
- Enum NetType
- Enum SignatureType
- Enum IncomingTransferType
- Class KeyImageList
### Changed
- Many changes based on wallet_rpc_server_commands_defs.h from the main Monero repo
- Renamed Tranfer to IncomingTransfer
- Many wallet-rpc Response classes got changed 
- Renamed TransferDestination to Recipient
- Some Response classes now extend other Response classes because they were identical

## v0.2.0 (2023-09-13)
### Added
- Added Address class for representing base58 addresses
- WalletExistsException
- InvalidLanguageException
- NoWalletFileException
- OpenWalletException
- BlockHash class
- Various wallet integration tests

### Changed
- composer requirements changed a bit
- Renamed KeyImage to SignedKeyImage
- All files include strict_types=1 now

## v0.1.0 (2023-09-11)
### Added
- Initial release

## v0.0.1 (2023-07-27)
### Added
- First version
