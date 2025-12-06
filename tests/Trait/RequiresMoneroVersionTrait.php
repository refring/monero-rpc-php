<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\Trait;

use ReflectionMethod;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Tests\Attribute\RequiresMoneroVersion;

/**
 * Trait to add version requirement checking to integration tests.
 *
 * Classes using this trait must implement getDaemonRpcClient() to provide
 * the client instance for version checking.
 */
trait RequiresMoneroVersionTrait
{
    private static ?string $cachedDaemonVersion = null;

    abstract protected static function getDaemonRpcClient(): DaemonRpcClient;

    protected function checkMoneroVersionRequirements(): void
    {
        $reflection = new ReflectionMethod($this, $this->name());

        // Check method-level attribute first, then class-level
        $attributes = $reflection->getAttributes(RequiresMoneroVersion::class);

        if (empty($attributes)) {
            $classReflection = $reflection->getDeclaringClass();
            $attributes = $classReflection->getAttributes(RequiresMoneroVersion::class);
        }

        if (empty($attributes)) {
            return;
        }

        $requirement = $attributes[0]->newInstance();
        $currentVersion = $this->getDaemonVersion();
        $currentVersion = preg_replace('/[^0-9.]/', '', $currentVersion);

        if (version_compare($currentVersion, $requirement->minVersion, '<')) {
            $this->markTestSkipped(sprintf(
                'Test requires Monero >= %s (current: %s)',
                $requirement->minVersion,
                $currentVersion
            ));
        }

        if ($requirement->maxVersion !== null) {
            if (version_compare($currentVersion, $requirement->maxVersion, '>')) {
                $this->markTestSkipped(sprintf(
                    'Test requires Monero <= %s (current: %s)',
                    $requirement->maxVersion,
                    $currentVersion
                ));
            }
        }
    }

    private function getDaemonVersion(): string
    {
        if (self::$cachedDaemonVersion === null) {
            self::$cachedDaemonVersion = static::getDaemonRpcClient()->getInfo()->version;
        }

        return self::$cachedDaemonVersion;
    }
}
