<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Exception;

use Exception;

final class AttributeNotFoundException extends Exception implements MoneroRpcException
{
}
