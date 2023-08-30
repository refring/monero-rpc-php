<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Model;

class Credentials
{
    public function __construct(private string $username, private string $password)
    {

    }
}
