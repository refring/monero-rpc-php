<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests;

class TestHelper
{
    /**
     * @var string
     */
    final public const GENESIS_BLOCK_HASH = '418015bb9ae982a1975da7d79277c2705727a56894ba0fb246adaabb1f4632e3';

    /**
     * @var string
     */
    final public const MAINNET_ADDRESS_1 = '43ZdL1Rm65iTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias54xAJXRm';
    final public const MAINNET_ADDRESS_2 = '45N8QHXrp6Ua5tATgoZKfNLsDtWRnFyQmgxkCiewWR3NWAbjrnXA2DLAKibMgBiaEyNyTZFDHSgm9X93k6yJe65D56qQdvK';

    /**
     * @var string
     */
    final public const TESTNET_ADDRESS_1 = '9u7ApG62NSpTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VvSVYVsP2kWVL73a4nCcpC4McwEivwVh9bJ5adihdSg1P9TAstP';

    /**
     * @var string
     */
    final public const WALLET_1_MNEMONIC = 'entrance sushi general eskimos salads aspire zippers noodles imbalance morsel bodies agnostic begun tedious unrest intended impel vats cajun aplomb films selfish weekday yellow intended';

    /**
     * @var string
     */
    final public const WALLET_2_MNEMONIC = 'attire cocoa jukebox inundate evicted arsenic vein wives irony dunes puzzled lurk lymph toyed selfish aggravate tequila roomy technical boil dwindling jackets using vehicle roomy';

    /**
     * @var string
     */
    final public const WALLET_3_MNEMONIC = 'mullet southern happens upstairs ruling auburn gutter doing calamity tattoo hive hectare diplomat catch wise shackles idiom vitals beer kiosk lower wept lurk nifty beer';

    /**
     * @var string
     */
    final public const WALLET_PWD_1 = 'b4r0l0';
    final public const WALLET_PWD_2 = 'b4r0l0-2';

    public static function getRandomWalletName(): string
    {
        return hash('sha256', (string) random_int(0, PHP_INT_MAX));
    }
}
