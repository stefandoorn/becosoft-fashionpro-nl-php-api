<?php

namespace Tests\BecosoftApi;

use BecosoftApi\GatewayFactory;
use GuzzleHttp\ClientInterface;
use Psr\Log\NullLogger;

class GatewayFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testGet()
    {
        $obj = GatewayFactory::get('testKey', true);

        $this->assertInstanceOf(NullLogger::class, $obj->getLogger());
        $this->assertInstanceOf(ClientInterface::class, $obj->getClient());
    }
}
