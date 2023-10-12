<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther\Model;

use RefRing\MoneroRpcPhp\Model\Amount;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class TxPoolStats implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Max transaction size in pool
     */
    #[Json('bytes_max')]
    public int $bytesMax;

    /**
     * Median transaction size in pool
     */
    #[Json('bytes_med')]
    public int $bytesMed;

    /**
     * Min transaction size in pool
     */
    #[Json('bytes_min')]
    public int $bytesMin;

    /**
     * total size of all transactions in pool
     */
    #[Json('bytes_total')]
    public int $bytesTotal;

    /**
     * The sum of the fees for all transactions currently in the transaction pool piconero.
     */
    #[Json('fee_total')]
    public Amount $feeTotal;

    /** @var TxPoolHisto[] @var TxPoolHisto[] as follows: */
    #[Json(type: TxPoolHisto::class)]
    public array $histo = [];

    /**
     * the time 98% of txes are "younger" than
     */
    #[Json('histo_98pc')]
    public int $histo98pc;

    /**
     * number of transactions in pool for more than 10 minutes
     */
    #[Json('num_10m')]
    public int $num10m;

    /**
     * number of double spend transactions
     */
    #[Json('num_double_spends')]
    public int $numDoubleSpends;

    /**
     * number of failing transactions
     */
    #[Json('num_failing')]
    public int $numFailing;

    /**
     * number of non-relayed transactions
     */
    #[Json('num_not_relayed')]
    public int $numNotRelayed;

    /**
     * unix time of the oldest transaction in the pool
     */
    #[Json]
    public int $oldest;

    /**
     * total number of transactions.
     */
    #[Json('txs_total')]
    public int $txsTotal;


    /**
     * @param TxPoolHisto[] $histo
     */
    public function __construct(
        int $bytesMax,
        int $bytesMed,
        int $bytesMin,
        int $bytesTotal,
        Amount $feeTotal,
        array $histo,
        int $histo98pc,
        int $num10m,
        int $numDoubleSpends,
        int $numFailing,
        int $numNotRelayed,
        int $oldest,
        int $txsTotal,
    ) {
        $this->bytesMax = $bytesMax;
        $this->bytesMed = $bytesMed;
        $this->bytesMin = $bytesMin;
        $this->bytesTotal = $bytesTotal;
        $this->feeTotal = $feeTotal;
        $this->histo = $histo;
        $this->histo98pc = $histo98pc;
        $this->num10m = $num10m;
        $this->numDoubleSpends = $numDoubleSpends;
        $this->numFailing = $numFailing;
        $this->numNotRelayed = $numNotRelayed;
        $this->oldest = $oldest;
        $this->txsTotal = $txsTotal;
    }
}
