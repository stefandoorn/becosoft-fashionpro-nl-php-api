<?php

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;

/**
 * Interface GatewayInterface.
 */
interface GatewayInterface
{
    /**
     * GatewayInterface constructor.
     *
     * @param ClientInterface|null $client
     * @param LoggerInterface|null $logger
     */
    public function __construct(ClientInterface $client = null, LoggerInterface $logger = null);

    /**
     * @return ClientInterface
     */
    public function getClient();

    /**
     * @return LoggerInterface
     */
    public function getLogger();
}
