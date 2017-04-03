<?php

namespace Tests\BecosoftApi;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;
use BecosoftApi\GatewayFactory;

class ApiTest extends \PHPUnit_Framework_TestCase
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
