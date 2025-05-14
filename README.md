# Monero Daemon & Wallet RPC client
[![Packagist Version](https://img.shields.io/packagist/v/refring/monero-rpc-php)](https://packagist.org/packages/refring/monero-rpc-php)
[![Tests](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/tests.yml/badge.svg)](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/tests.yml)
[![PHPStan](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/phpstan.yml/badge.svg)](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/phpstan.yml)
[![codecov](https://codecov.io/gh/refactor-ring/monero-rpc-php/graph/badge.svg?token=P8K26M8W6N)](https://codecov.io/gh/refactor-ring/monero-rpc-php)
[![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/refring/monero-rpc-php/php)](https://packagist.org/packages/refring/monero-rpc-php)


Monero daemon and wallet RPC client library written in modern PHP.

## Features
* Implements Monero wallet and daemon rpc methods
* Support authentication for the wallet and daemon rpc servers
* Fully strongly typed and strict_types enabled
* Minimal dependencies
* PSR-18 compatible, so different http client libraries can be used

<a name="installation"></a>
## Installation

You can install the package with Composer, at this this time minimum-stability has to be set to dev:
```bash
composer require refring/monero-rpc-php
```

When your project does not have a http client available yet, you should require one as well.

Different http clients can be used:

### guzzle
```bash 
composer require guzzlehttp/guzzle
```

<details>
<summary>Other http clients</summary>

### symfony http client
```bash
composer require symfony/http-client psr/http-client nyholm/psr7
```

### buzz
```bash
composer require kriswallsmith/buzz nyholm/psr7
```

### php-http/curl-client
```bash
composer php-http/curl-client
```
</details>

## Setup

### Creating a client
For the wallet rpc client:

```php
$walletClient = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->buildWalletClient();

echo $walletClient->getVersion()->version;
```
Daemon rpc client:

```php
$daemonClient = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->buildDaemonClient();

echo $daemonClient->getVersion()->version;
```

### Using authentication

```php
$daemonClient = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->withAuthentication('foo', 'bar')
    ->buildDaemonClient();

echo $daemonClient->getVersion()->version;
```

### Connecting through a proxy
Configuring a proxy is specific to the http client library.

Below is a Symfony Http Client example for a socks5 proxy:
```php
$httpClient = new Psr18Client(new CurlHttpClient([
    'http_version' => '2.0',
    'proxy' => 'socks5://username:password@127.0.0.1:9999',
]));

$daemonClient = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://examplenode/json_rpc'))
    ->withHttpClient($httpClient)
    ->buildDaemonClient();
```

### Injecting a logger
The client builder also supports injecting a logger and/or a http client: 
```php
$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$logger = new \Psr\Log\NullLogger();

$daemonClient = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))    
    ->withHttpClient($httpClient)
    ->withLogger($logger)
    ->buildDaemonClient();
```

## Usage
### Creating a wallet and account
```php
// Try to create a wallet, or open it when it already exists
try{
    $walletClient->createWallet('testwallet', 'English', 'password');
} catch (WalletExistsException $e) {
    $walletClient->openWallet('testwallet', 'password');
} catch(MoneroRpcException $e) {
    echo 'An error occured: '.$e->getMessage();
}

$baseAddressData = $walletClient->getAddress();
$subAddressData = $walletClient->createAddress();

printf("BaseAddress: %s\nSubAddress: %s\n", $baseAddressData->address, $subAddressData->address);

// Create another account
$newAccountData = $walletClient->createAccount('another account');
$newAccountSubAddress = $walletClient->createAddress($newAccountData->accountIndex);

printf("Account %d\nBaseAddress: %s\nSubAddress: %s", $newAccountData->accountIndex, $newAccountData->address, $newAccountSubAddress->address);

```

## Testing

The project has unit tests and integration tests, the unit tests can be run using `composer test:unit`

To run the integration tests, you'll need `docker` and `docker compose`  or you could run `monerod` and `monero-wallet-rpc` on your own.

If you have the docker stack installed, go to the `tests` folder and run `docker compose up`. Note that the daemon will run on port `18081` and `monero-wallet-rpc` will run on port `18083`.

After that, run `composer test:integration` to run the integration tests.

## Compatibility

Only the latest 3 point releases of Monero are actively supported and covered by integration tests.

##  Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md)


##  Changelog

See [CHANGELOG.md](CHANGELOG.md)

<a name="license"></a>
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Acknowledgments
* [monero-rpc-rs](https://github.com/monero-rs/monero-rpc-rs) - Parts of this project served as inspiration.
* [monero-php](https://github.com/monero-integrations/monerophp) - Thanks for providing the php ecosystem with a Monero library during all these years!
* [Monero](https://getmonero.org) - Thanks to everybody involved!
