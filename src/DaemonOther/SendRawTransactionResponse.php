<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\DaemonRpc\DaemonBaseResponse;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Broadcast a raw transaction to the network.
 */
class SendRawTransactionResponse extends DaemonBaseResponse
{
    use JsonSerialize;

    /**
     * Transaction is a double spend (`true`) or not (`false`).
     */
    #[Json('double_spend')]
    public bool $doubleSpend;

    /**
     * Fee is too low (`true`) or OK (`false`).
     */
    #[Json('fee_too_low')]
    public bool $feeTooLow;

    /**
     * Input is invalid (`true`) or valid (`false`).
     */
    #[Json('invalid_input')]
    public bool $invalidInput;

    /**
     * Output is invalid (`true`) or valid (`false`).
     */
    #[Json('invalid_output')]
    public bool $invalidOutput;

    /**
     * Mixin count is too low (`true`) or OK (`false`).
     */
    #[Json('low_mixin')]
    public bool $lowMixin;

    /**
     * Transaction is a standard ring transaction (`true`) or a ring confidential transaction (`false`).
     */
    #[Json('not_rct')]
    public bool $notRct;

    /**
     * Transaction was not relayed (`true`) or relayed (`false`).
     */
    #[Json('not_relayed')]
    public bool $notRelayed;

    /**
     * Transaction uses more money than available (`true`) or not (`false`).
     */
    #[Json]
    public bool $overspend;

    /**
     * Additional information. Currently empty or "Not relayed" if transaction was accepted but not relayed.
     */
    #[Json]
    public string $reason;

    /**
     * Transaction size is too big (`true`) or OK (`false`).
     */
    #[Json('too_big')]
    public bool $tooBig;
}
