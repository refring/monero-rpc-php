<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class Transfer
{
    use JsonSerialize;

    /**
     * Address that transferred the funds. Base58 representation of the public keys.
     */
    #[Json]
    public string $address;

    /**
     * Amount of this transfer.
     */
    #[Json]
    public int $amount;

    /**
     * Individual amounts if multiple where received.
     */
    #[Json]
    public array $amounts;

    /**
     * Number of block mined since the block containing this transaction (or block height at which the transaction should be added to a block if not yet confirmed).
     */
    #[Json]
    public int $confirmations;

    /**
     * @var TransferDestination[]  array of JSON objects containing transfer destinations: (only for outgoing transactions)
     */
    #[Json]
    public array $destinations;

    #[Json('TransferDestination')]
    public TransferDestination $transferDestination;
}
