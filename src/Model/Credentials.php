<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

class Credentials
{
    public function __construct(public string $username, public string $password)
    {

    }
}
