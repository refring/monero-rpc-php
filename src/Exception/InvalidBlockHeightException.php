<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use Exception;

final class InvalidBlockHeightException extends Exception implements MoneroRpcException
{
}
