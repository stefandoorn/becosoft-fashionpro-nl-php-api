<?php

namespace Tests\BecosoftApi\Entity;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;
use BecosoftApi\Entity\AbstractEntity;
use BecosoftApi\Entity\ClientSalesRep;
use BecosoftApi\Entity\EntityInterface;
use BecosoftApi\GatewayFactory;

class ClientSalesRepTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ApiInterface
     */
    private $api;

    public function setUp()
    {
        $gateway = GatewayFactory::get('testKey');
        $this->api = new Api($gateway);
    }

    public function testEntity()
    {
        $entity = new ClientSalesRep($this->api);

        $this->assertInstanceOf(AbstractEntity::class, $entity);
        $this->assertInstanceOf(EntityInterface::class, $entity);
    }
}
