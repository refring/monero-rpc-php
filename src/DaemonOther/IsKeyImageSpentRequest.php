<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use Square\Pjson\JsonSerialize;

/**
 * Check if outputs have been spent using the key image associated with the output.
 */
class IsKeyImageSpentRequest extends OtherRpcRequest
{
    use JsonSerialize;

    /**
     * @var string[] List of key image hex strings to check.
     */
    #[Json('key_images')]
    public array $keyImages;

    /**
     * @param string[] $keyImages
     */
    public static function create(array $keyImages): OtherRpcRequest
    {
        $self = new self();
        $self->keyImages = $keyImages;
        return $self;
    }
}
