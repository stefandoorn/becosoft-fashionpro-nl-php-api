<?php declare(strict_types=1);

namespace Tests\BecosoftApi;

use BecosoftApi\GatewayFactory;
use BecosoftApi\GatewayInterface;
use GuzzleHttp\ClientInterface;
use Psr\Log\NullLogger;

final class GatewayFactoryTest extends \PHPUnit\Framework\TestCase
{

    public function testGet()
    {
        $obj = GatewayFactory::get('testKey', true);
        $this->assertInstanceOf(GatewayInterface::class, $obj);

        $this->assertInstanceOf(NullLogger::class, $obj->getLogger());
        $this->assertInstanceOf(ClientInterface::class, $obj->getClient());
    }
}
