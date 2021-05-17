<?php declare(strict_types=1);

namespace Tests\BecosoftApi\Entity;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;
use BecosoftApi\Entity\AbstractEntity;
use BecosoftApi\Entity\Artikel;
use BecosoftApi\Entity\EntityInterface;
use BecosoftApi\GatewayFactory;

final class ArtikelTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var ApiInterface
     */
    private $api;

    public function setUp(): void
    {
        $gateway = GatewayFactory::get('testKey');
        $this->api = new Api($gateway);
    }

    public function testEntity()
    {
        $entity = new Artikel($this->api);

        $this->assertInstanceOf(AbstractEntity::class, $entity);
        $this->assertInstanceOf(EntityInterface::class, $entity);
    }
}
