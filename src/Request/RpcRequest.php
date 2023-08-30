<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Request;

use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

class RpcRequest
{
    use JsonSerialize;

    #[Json]
    private readonly string $jsonrpc;

    #[Json]
    private readonly string $id;

    #[Json]
    private readonly string $method;

    #[Json('params', omit_empty: true)]
    private readonly ?ParameterInterface $parameters;

    public function __construct(string $method, ParameterInterface $parameters = null)
    {
        $this->method = $method;
        $this->jsonrpc = '2.0';
        $this->id = '0';

        if ($parameters instanceof \Traversable) {
            $this->parameters = $parameters;
        }
        elseif ($parameters instanceof ParameterInterface) {
            // @TODO deserialization is done twice now.. this could be done better
            if($parameters->toJson() != '[]')
                $this->parameters = $parameters;
        }
    }
}
