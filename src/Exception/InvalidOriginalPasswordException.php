<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use Exception;

final class InvalidOriginalPasswordException extends Exception implements MoneroRpcException
{
}
