<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use Exception;

final class WalletExistsException extends Exception implements MoneroRpcException
{
}
