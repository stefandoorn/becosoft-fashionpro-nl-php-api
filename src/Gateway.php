<?php

declare(strict_types=1);

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class Gateway implements GatewayInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(ClientInterface $client = null, LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->logger = $logger ? $logger : new NullLogger();
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function setLogger($logger): self
    {
        $this->logger = $logger;

        return $this;
    }
}
