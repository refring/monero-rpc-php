<?php

namespace RefRing\MoneroRpcPhp\Enum;

use RefRing\MoneroRpcPhp\Exception\AccountIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressNotInWalletException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;

enum ErrorCode: string
{
    case AccountIndexOutOfBound = 'Account index out of bound';
    case AddressNotInWallet = "Address doesn't belong to the wallet";

    public function toException(): MoneroRpcException
    {
        return match ($this) {
            self::AccountIndexOutOfBound => new AccountIndexOutOfBoundException('Account index out of bound'),
            self::AddressNotInWallet => new AddressNotInWalletException("Address doesn't belong to the wallet"),
        };
    }
}
