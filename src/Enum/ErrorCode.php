<?php

namespace RefRing\MoneroRpcPhp\Enum;

use RefRing\MoneroRpcPhp\Exception\AccountIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressNotInWalletException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidReservedSizeException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;

enum ErrorCode: string
{
    case AccountIndexOutOfBound = 'Account index out of bound';
    case AddressNotInWallet = "Address doesn't belong to the wallet";
    case InvalidBlockHeight = "Invalid height %s supplied";
    case InvalidReservedSize = "Too big reserved size, maximum 255";
    case InvalidAddress = "Failed to parse wallet address";

    public function toException(...$placeHolders): MoneroRpcException
    {
        $message = $this->value;

        if (count($placeHolders) > 0) {
            $message = sprintf($message, ...$placeHolders);
        }

        $exception = match ($this) {
            self::AccountIndexOutOfBound => new AccountIndexOutOfBoundException($message),
            self::AddressNotInWallet => new AddressNotInWalletException($message),
            self::InvalidBlockHeight => new InvalidBlockHeightException($message),
            self::InvalidReservedSize => new InvalidReservedSizeException($message),
            self::InvalidAddress => new InvalidAddressException($message),
        };

        return $exception;
    }
}
