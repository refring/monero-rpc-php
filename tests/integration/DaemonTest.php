<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\Tests\integration;

use Http\Discovery\Psr18ClientDiscovery;
use PHPUnit\Framework\TestCase;
use RefRing\MoneroRpcPhp\DaemonRpc\Model\Node;
use RefRing\MoneroRpcPhp\DaemonRpcClient;
use RefRing\MoneroRpcPhp\Enum\ResponseStatus;
use RefRing\MoneroRpcPhp\Exception\InvalidHostOrSubnetException;
use RefRing\MoneroRpcPhp\Exception\NoIpOrHostSuppliedException;
use RefRing\MoneroRpcPhp\Tests\Attribute\RequiresMoneroVersion;
use RefRing\MoneroRpcPhp\Tests\Trait\RequiresMoneroVersionTrait;

final class DaemonTest extends TestCase
{
    use RequiresMoneroVersionTrait;

    private static DaemonRpcClient $rpcClient;

    public static function setUpBeforeClass(): void
    {
        $httpClient = Psr18ClientDiscovery::find();
        self::$rpcClient = new DaemonRpcClient($httpClient, getenv('DAEMON_RPC_URL'));
    }

    protected function setUp(): void
    {
        $this->checkMoneroVersionRequirements();
    }

    protected static function getDaemonRpcClient(): DaemonRpcClient
    {
        return self::$rpcClient;
    }

    public function testSetBansOk(): void
    {
        $node = new Node('127.0.0.1', null, true, 60);
        $result = self::$rpcClient->setBans([$node]);
        $this->assertSame(ResponseStatus::OK, $result->status);
    }

    public function testSetBansInvalidHost(): void
    {
        $this->expectException(InvalidHostOrSubnetException::class);

        $node = new Node('localhost', null, true, 60);
        $result = self::$rpcClient->setBans([$node]);
    }

    #[RequiresMoneroVersion('0.18.4.0')]
    public function testSetBansMissingIp(): void
    {
        $this->expectException(NoIpOrHostSuppliedException::class);

        $node = new Node(null, null, true, 60);
        $result = self::$rpcClient->setBans([$node]);
    }
}
