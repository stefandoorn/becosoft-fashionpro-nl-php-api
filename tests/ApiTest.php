<?php declare(strict_types=1);

namespace Tests\BecosoftApi;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;
use BecosoftApi\GatewayFactory;

final class ApiTest extends \PHPUnit\Framework\TestCase
{

    public function testObject()
    {
        $gateway = GatewayFactory::get('testKey');
        $api = new Api($gateway);

        $this->assertInstanceOf(ApiInterface::class, $api);
    }

    public function testObjectDebugSet()
    {
        $gateway = GatewayFactory::get('testKey', $debug = true);
        $api = new Api($gateway);

        $this->assertSame($api->getGateway(), $gateway);
        $this->assertTrue($api->getConfig('debug'));
    }

    public function testObjectDebugNotSet()
    {
        $gateway = GatewayFactory::get('testKey');
        $api = new Api($gateway);

        $this->assertSame($api->getGateway(), $gateway);
        $this->assertFalse($api->getConfig('debug'));
    }

}
