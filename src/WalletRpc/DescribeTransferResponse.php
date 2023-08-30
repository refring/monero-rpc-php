<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\WalletRpc;

use RefRing\MoneroRpcPhp\Model\TransferDescription;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Returns details for each transaction in an unsigned or multisig transaction set. Transaction sets are obtained as return values from one of the following RPC methods:* transfer* transfer_split* sweep_all* sweep_single* sweep_dustThese methods return unsigned transaction sets if the wallet is view-only (i.e. the wallet was created without the private spend key).<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
 */
class DescribeTransferResponse
{
	use JsonSerialize;

	/** @var TransferDestination[] */
	#[Json]
	public array $desc;

	/**
	 * The address of the change recipient.
	 */
	#[Json('change_address')]
	public string $changeAddress;

	/**
	 * The amount sent to the change address in @atomic-units.
	 */
	#[Json('change_amount')]
	public int $changeAmount;

	/**
	 * The fee charged for the transaction in @atomic-units.
	 */
	#[Json]
	public int $fee;

	/**
	 * payment ID for this transfer.
	 */
	#[Json('payment_id')]
	public string $paymentId;

	/**
	 * The number of inputs in the ring (1 real output + the number of decoys from the blockchain) (Unless dealing with pre rct outputs, this field is ignored on mainnet).
	 */
	#[Json('ring_size')]
	public int $ringSize;

	/**
	 * The number of blocks before the monero can be spent (0 for no lock).
	 */
	#[Json('unlock_time')]
	public int $unlockTime;

	/**
	 * The number of fake outputs added to single-output transactions.  Fake outputs have 0 amount and are sent to a random address.
	 */
	#[Json('dummy_outputs')]
	public int $dummyOutputs;

	/**
	 * Arbitrary transaction data in hexadecimal format.
	 */
	#[Json]
	public string $extra;
}
