<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests;

class TestHelper
{
    /**
     * @var string
     */
    final public const WALLET_RPC_URL = 'http://127.0.0.1:18083/json_rpc';

    /**
     * @var string
     */
    final public const GENESIS_BLOCK_HASH = '418015bb9ae982a1975da7d79277c2705727a56894ba0fb246adaabb1f4632e3';

    /**
     * @var string
     */
    final public const MAINNET_ADDRESS = '46FTwA4zSi1Pv6vmDGbfbvTKzNZonqNbuSdf9DzjYcJ9atw2rSWKN91ZFpuZsNicYqVdbSxAwS3T23KxfdW1aByDMmtVHTc';

    /**
     * @var string
     */
    final public const TESTNET_ADDRESS = '9wo1RQjFj57Pv6vmDGbfbvTKzNZonqNbuSdf9DzjYcJ9atw2rSWKN91ZFpuZsNicYqVdbSxAwS3T23KxfdW1aByDMsWiNq2';

    /**
     * @var string
     */
    final public const PRIVATE_SPEND_KEY_1 = '90b7a822fbd3d06d04f5ad746300601a85c469ffc21b2fd7281cc43227537209';

    /**
     * @var string
     */
    final public const PRIVATE_VIEW_KEY_1 = '21dbc3b71b900ac5af0d2e1cc3b279ad3b4a66633d1d8f6653b838f11bd14904';

    /**
     * @var string
     */
    final public const WALLET_PWD_1 = 'b4r0l0';

    public static function getRandomWalletName(): string
    {
        return hash('sha256', random_int(0, PHP_INT_MAX));
    }
}
