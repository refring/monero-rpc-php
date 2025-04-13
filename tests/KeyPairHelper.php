<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests;

class KeyPairHelper
{
    private static array $knownKeys = [
        'mullet southern happens upstairs ruling auburn gutter doing calamity tattoo hive hectare diplomat catch wise shackles idiom vitals beer kiosk lower wept lurk nifty beer' =>
            [
                'privateSpendKey' => 'beb963906ef203568ce759ef6933dbfcfddd34d516ddc68a667cee0ac663d80f',
                'privateViewKey' => 'd58e9e604803984d9f8a99fe3d2066f51c01d720ae6dddde5d93da673e0db802',
                'publicSpendKey' => '49144baa327020863a4c5f2cc6177645e16afa9ddb295c085fbf7acd9657f25e',
                'publicViewKey' => 'e8da38ac2773cfa95eccedeb01aa45140fb037496607a8cd08806484c4e19ac4',
                'mainnetAddress' => '44PjSFMvmnwPTBGmSYmrxmCgvsMKp3UTm2QEq7Wts6f3Gsk2TXzubtAVL73a4nCcpC4McwEivwVh9bJ5adihdSg1PBu5aX5',
                'testnetAddress' => '9uwGvW2C4A3PTBGmSYmrxmCgvsMKp3UTm2QEq7Wts6f3Gsk2TXzubtAVL73a4nCcpC4McwEivwVh9bJ5adihdSg1PCPKvtg',
            ],
        'attire cocoa jukebox inundate evicted arsenic vein wives irony dunes puzzled lurk lymph toyed selfish aggravate tequila roomy technical boil dwindling jackets using vehicle roomy' =>
            [
                'privateSpendKey' => '6869f84b71380dcce1b80b730a3d15d3b9c78ee49f7136e3fd7cc71bedcc6203',
                'privateViewKey' => 'eb9a8f225f6cd0cdc123190aaa383da4c3bb04592e3c44b747b6ab5b29112501',
                'publicSpendKey' => '62bce2cd4610a1c5cc1f82d96e7e7976c53ca6744cdf02eee9735b1fef84b1ae',
                'publicViewKey' => '5e7f0cf8881b9737bca128ccbe7636835ed55f0a3cb264b43013249ce3504024',
                'mainnetAddress' => '45N8QHXrp6Ua5tATgoZKfNLsDtWRnFyQmgxkCiewWR3NWAbjrnXA2DLAKibMgBiaEyNyTZFDHSgm9X93k6yJe65D56qQdvK',
                'testnetAddress' => '9vuftYC86Taa5tATgoZKfNLsDtWRnFyQmgxkCiewWR3NWAbjrnXA2DLAKibMgBiaEyNyTZFDHSgm9X93k6yJe65D55tM9i4',
            ],
        'entrance sushi general eskimos salads aspire zippers noodles imbalance morsel bodies agnostic begun tedious unrest intended impel vats cajun aplomb films selfish weekday yellow intended' =>
           [
                'privateSpendKey' => '2c89418208eca6529da8e3d3f6c1d8e8baddb70f50d228858d7c9a3dee1ef706',
                'privateViewKey' => 'b0d5acdf39ff369ea9d162205e21b9e1a2e02607098cfb4eda9f4612328de60f',
                'publicSpendKey' => '3331575e3c4be59dbf5c5703d5161d623d1133dd77eba4c586261a33ce5bf4ac',
                'publicViewKey' => 'fd053231002a87ea00d74b3a9138c3031d9be070a7017d7bfda65304c2d3c423',
                'mainnetAddress' => '43ZdL1Rm65iTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias54xAJXRm',
                'testnetAddress' => '9u7ApG62NSpTPMCwxaHWPWHS39F3rVjM5a3EN78fSYc3VwCpZ7XTreJg98FU5EmMJi1XE6bjxXH9EMjsF7KBias54xqVKJj',
            ]
    ];

    private string $seedPhase = '';

    public function __construct(private string $seedPhrase)
    {
        if (!array_key_exists($seedPhrase, self::$knownKeys)) {
            throw new \Exception('Seed phrase not found');
        }

        $this->seedPhrase = $seedPhrase;
    }

    public function getPrivateSpendKey(): string
    {
        return self::$knownKeys[$this->seedPhrase]['privateSpendKey'];
    }

    public function getPrivateViewKey(): string
    {
        return self::$knownKeys[$this->seedPhrase]['privateViewKey'];
    }

    public function getPublicSpendKey(): string
    {
        return self::$knownKeys[$this->seedPhrase]['publicSpendKey'];
    }

    public function getPublicViewKey(): string
    {
        return self::$knownKeys[$this->seedPhrase]['publicViewKey'];
    }

    public function getAddress(): string
    {
        return self::$knownKeys[$this->seedPhrase]['mainnetAddress'];
    }

    public function getTestnetAddress(): string
    {
        return self::$knownKeys[$this->seedPhrase]['testnetAddress'];
    }
}
