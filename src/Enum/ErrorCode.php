<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Enum;

use RefRing\MoneroRpcPhp\Exception\AccountIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressIndexOutOfBoundException;
use RefRing\MoneroRpcPhp\Exception\AddressNotInWalletException;
use RefRing\MoneroRpcPhp\Exception\AttributeNotFoundException;
use RefRing\MoneroRpcPhp\Exception\AuthenticationException;
use RefRing\MoneroRpcPhp\Exception\BlockNotAcceptedException;
use RefRing\MoneroRpcPhp\Exception\HttpApiException;
use RefRing\MoneroRpcPhp\Exception\IndexOutOfRangeException;
use RefRing\MoneroRpcPhp\Exception\InvalidAddressException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHashException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockHeightRangeException;
use RefRing\MoneroRpcPhp\Exception\InvalidBlockTemplateBlobException;
use RefRing\MoneroRpcPhp\Exception\InvalidLanguageException;
use RefRing\MoneroRpcPhp\Exception\InvalidPaymentIdException;
use RefRing\MoneroRpcPhp\Exception\InvalidReservedSizeException;
use RefRing\MoneroRpcPhp\Exception\MoneroRpcException;
use RefRing\MoneroRpcPhp\Exception\NoWalletFileException;
use RefRing\MoneroRpcPhp\Exception\OpenWalletException;
use RefRing\MoneroRpcPhp\Exception\TagNotFoundException;
use RefRing\MoneroRpcPhp\Exception\WalletExistsException;

enum ErrorCode: string
{
    case AccountIndexOutOfBound = 'Account index out of bound';
    case AddressIndexOutOfBound = 'address index is out of bound';
    case AddressNotInWallet = "Address doesn't belong to the wallet";
    case InvalidBlockHeight = "Invalid block height supplied";
    case InvalidReservedSize = "Too big reserved size, maximum 255";
    case InvalidAddress = "Failed to parse wallet address";
    case InvalidBlockHash = "Invalid block hash";
    case InvalidBlockHeightRange = "Invalid start/end heights.";
    case InvalidBlockTemplateBlob = "Wrong block blob";
    case BlockNotAccepted = "Block not accepted";

    case AuthenticationFailure = "Authentication failed";
    case WalletAlreadyExists = "Cannot create wallet. Already exists.";
    case InvalidLanguage = "Unknown language supplied";
    case NoWalletFile = "No wallet file";
    case OpenWalletFailure = "Failed to open wallet";
    case AttributeNotFound = "Attribute not found.";
    case TagUnregisteredError = "Tag is unregistered.";
    case IndexOutOfRangeError = "Index out of range";
    case InvalidPaymentId = "Invalid payment ID";

    public static function getErrorCodeFromString(string $error): self
    {
        // First try to just find an exact match for the error message
        $errorCode = self::tryFrom($error);

        if ($errorCode !== null) {
            return $errorCode;
        }

        $errorMessages = [
            // Internal error: can't get block by hash. Hash = 0000000000000000000000000000000000000000000000000000000000000000.
            "Internal error: can't get block by hash. Hash =" =>  self::InvalidBlockHash,
            // Requested block height: 10 greater than current top block height: 0
            'greater than current top block height' => self::InvalidBlockHeight,
            // Tag invalidTag is unregistered
            ' is unregistered' => self::TagUnregisteredError,
            // Index out of range: 6
            'Index out of range' => self::IndexOutOfRangeError,
            '401 Unauthorized' => self::AuthenticationFailure,
            'Unknown language:' => self::InvalidLanguage,
            'account index is out of bound' => self::AccountIndexOutOfBound,
            'Invalid address' => self::InvalidAddress,
        ];

        // If an exact match was not found try to find a partial match
        $errorCode = current(array_filter(
            $errorMessages,
            static fn (string $errorMessage) => str_contains($error, $errorMessage),
            ARRAY_FILTER_USE_KEY
        ));

        if ($errorCode === false) {
            throw new HttpApiException($error);
        }

        return $errorCode;
    }

    public function toException(int|string ...$placeHolders): MoneroRpcException
    {
        $message = $this->value;

        if ($placeHolders !== []) {
            $message = sprintf($message, ...$placeHolders);
        }

        $exception = match ($this) {
            self::AccountIndexOutOfBound => new AccountIndexOutOfBoundException($message),
            self::AddressIndexOutOfBound => new AddressIndexOutOfBoundException($message),
            self::AddressNotInWallet => new AddressNotInWalletException($message),
            self::InvalidBlockHeight => new InvalidBlockHeightException($message),
            self::InvalidReservedSize => new InvalidReservedSizeException($message),
            self::InvalidAddress => new InvalidAddressException($message),
            self::InvalidBlockHash => new InvalidBlockHashException($message),
            self::InvalidBlockHeightRange => new InvalidBlockHeightRangeException($message),
            self::InvalidBlockTemplateBlob => new InvalidBlockTemplateBlobException($message),
            self::BlockNotAccepted => new BlockNotAcceptedException($message),
            self::AuthenticationFailure => new AuthenticationException($message),
            self::WalletAlreadyExists => new WalletExistsException($message),
            self::InvalidLanguage => new InvalidLanguageException($message),
            self::NoWalletFile => new NoWalletFileException($message),
            self::OpenWalletFailure => new OpenWalletException($message),
            self::AttributeNotFound => new AttributeNotFoundException($message),
            self::TagUnregisteredError => new TagNotFoundException($message),
            self::IndexOutOfRangeError => new IndexOutOfRangeException($message),
            self::InvalidPaymentId => new InvalidPaymentIdException($message),
        };

        return $exception;
    }
}
