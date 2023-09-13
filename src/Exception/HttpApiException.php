<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use RuntimeException;

final class HttpApiException extends RuntimeException implements MoneroRpcException
{
}
