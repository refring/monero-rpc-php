<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonOther;

use RefRing\MoneroRpcPhp\Request\OtherRpcRequest;
use Square\Pjson\Json;
use RefRing\MoneroRpcPhp\Trait\JsonSerializeBigInt;

/**
 * Set the daemon log categories.Categories are represented as a comma separated list of `<Category>:<level>`
 * (similarly to syslog standard `<Facility>:<Severity-level>`)
 */
class SetLogCategoriesRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * Daemon log categories to enable
     */
    #[Json(omit_empty: true)]
    public ?string $categories;

    public static function create(?string $categories = null): OtherRpcRequest
    {
        $self = new self();
        $self->categories = $categories;
        return $self;
    }
}
