# Monero Daemon & Wallet RPC

Monero daemon and wallet RPC written in PHP.

**WARNING:** The API might still undergo significant changes so use at own risk

## Features
* Implements Monero wallet and daemon json-rpc methods
* Support authentication for the wallet and daemon rpc servers
* Completely strong-typed
* PSR-18 compatible, so different http client libraries can be used

<a name="installation"></a>
## Installation

You can install the package with Composer:

```bash
composer require refactor_ring/monero-rpc-php
```

## Usage

First make sure to have http client library like guzzlehttp/guzzle or symfony/http-client installed.

For the wallet rpc client:
```php
$client = (new Builder('http://127.0.0.1:18081/json_rpc'))
    ->buildWalletClient();

echo $client->getVersion()->version;
```
Daemon rpc client:
```php
$client = (new Builder('http://127.0.0.1:18081/json_rpc'))
    ->buildDaemonClient();

echo $client->getVersion()->version;
```

With authentication:
```php
$client = (new Builder('http://127.0.0.1:18081/json_rpc'))
    ->withAuthentication('foo', 'bar')
    ->buildDaemonClient();

echo $client->getVersion()->version;
```

## Testing

The project has unit tests and integration tests, the unit tests can be run using `composer test:unit`

To run the integration tests, you'll need `docker` and `docker compose`  or you could run `monerod` and `monero-wallet-rpc` on your own.

If you have the docker stack installed, go to the `tests` folder and run `docker compose up`. Note that the daemon will run on port `18081` and `monero-wallet-rpc` will run on port `18083`.

After that, run `composer test:integration`

Also, you can run `docker compose down` to stop and remove the containers started by `docker compose up`.

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
