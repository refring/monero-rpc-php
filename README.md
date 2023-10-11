# Monero Daemon & Wallet RPC client
[![Latest Stable Version](http://poser.pugx.org/refactor_ring/monero-rpc-php/v)](https://packagist.org/packages/refactor_ring/monero-rpc-php)
[![Tests](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/tests.yml/badge.svg)](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/tests.yml)
[![PHPStan](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/phpstan.yml/badge.svg)](https://github.com/refactor-ring/monero-rpc-php/actions/workflows/phpstan.yml)
[![codecov](https://codecov.io/gh/refactor-ring/monero-rpc-php/graph/badge.svg?token=P8K26M8W6N)](https://codecov.io/gh/refactor-ring/monero-rpc-php)
[![PHP Version Require](http://poser.pugx.org/refactor_ring/monero-rpc-php/require/php)](https://packagist.org/packages/refactor_ring/monero-rpc-php)

Monero daemon and wallet RPC client library written in modern PHP.

**WARNING:** The API might still undergo significant changes so use at own risk

## Features
* Implements Monero wallet and daemon json-rpc methods
* Support authentication for the wallet and daemon rpc servers
* Fully strongly typed and strict_types enabled
* Minimal dependencies
* PSR-18 compatible, so different http client libraries can be used

<a name="installation"></a>
## Installation

You can install the package with Composer:

```bash
composer require refactor_ring/monero-rpc-php
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

## Usage

For the wallet rpc client:

```php
$client = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->buildWalletClient();

echo $client->getVersion()->version;
```
Daemon rpc client:

```php
$client = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->buildDaemonClient();

echo $client->getVersion()->version;
```

With authentication:

```php
$client = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))
    ->withAuthentication('foo', 'bar')
    ->buildDaemonClient();

echo $client->getVersion()->version;
```

The client builder also supports injecting a logger and/or a http client: 
```php
$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$logger = new \Psr\Log\NullLogger();

$client = (new \RefRing\MoneroRpcPhp\ClientBuilder('http://127.0.0.1:18081/json_rpc'))    
    ->withHttpClient($httpClient)
    ->withLogger($logger)
    ->buildDaemonClient();
```


## Testing

The project has unit tests and integration tests, the unit tests can be run using `composer test:unit`

To run the integration tests, you'll need `docker` and `docker compose`  or you could run `monerod` and `monero-wallet-rpc` on your own.

If you have the docker stack installed, go to the `tests` folder and run `docker compose up`. Note that the daemon will run on port `18081` and `monero-wallet-rpc` will run on port `18083`.

After that, run `composer test:integration` to run the integration tests.

## Roadmap
- [ ] More integration tests
- [ ] Improve documentation and add examples
- [ ] Implement remaining 'Other Daemon RPC Calls'
    - [ ] /get_transaction_pool

##  Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md)


##  Changelog

See [CHANGELOG.md](CHANGELOG.md)

<a name="license"></a>
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Acknowledgments
* [monero-rpc-rs](https://github.com/monero-rs/monero-rpc-rs) - The project's extensive testsuite was used for setting up this project's testuite
* [monero-php](https://github.com/monero-integrations/monerophp) - Thanks for providing the php ecosystem with a Monero library during all these years!
* [Monero](https://getmonero.org) - Thanks to everybody involved!
