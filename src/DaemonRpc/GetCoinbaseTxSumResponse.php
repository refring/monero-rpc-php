<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Get the coinbase amount and the fees amount for n last blocks starting at particular height
 */
class GetCoinbaseTxSumResponse
{
    use JsonSerialize;
    use DaemonRpcAccessResponseFields;

    /**
     * Least significant 64 bits for 128 bit integer representing the sum of coinbase rewards in piconero. (See src/rpc/core_rpc_server.cpp store_128)
     */
    #[Json('emission_amount')]
    public int $emissionAmount;

    /**
     * Most significant 64 bits for 128 bit integer representing the sum of coinbase rewards in piconero
     */
    #[Json('emission_amount_top64')]
    public int $emissionAmountTop64;

    /**
     * Most significant 64 bits for 128 bit integer representing the sum of fees in piconero.
     */
    #[Json('fee_amount')]
    public int $feeAmount;

    /**
     * Most significant 64 bits for 128 bit integer representing the sum of fees in piconero.
     */
    #[Json('fee_amount_top64')]
    public int $feeAmountTop64;

    /**
     * Sum of coinbase rewards in piconero.
     */
    #[Json('wide_emission_amount')]
    public string $wideEmissionAmount;

    /**
     * Sum of fees in piconero.
     */
    #[Json('wide_fee_amount')]
    public string $wideFeeAmount;
}
