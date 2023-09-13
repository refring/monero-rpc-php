<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use Exception;

final class InvalidBlockHashException extends Exception implements MoneroRpcException
{
}
