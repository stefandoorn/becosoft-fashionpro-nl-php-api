<?php

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class Gateway.
 */
class Gateway implements GatewayInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Gateway constructor.
     * @param ClientInterface|null $client
     * @param LoggerInterface|null $logger
     */
    public function __construct(ClientInterface $client = null, LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->logger = $logger ? $logger : new NullLogger();
    }

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     *
     * @return Gateway
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param $logger
     *
     * @return Gateway
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;

        return $this;
    }
}
