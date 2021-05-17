<?php

declare(strict_types=1);

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;

interface GatewayInterface
{
    public function __construct(ClientInterface $client = null, LoggerInterface $logger = null);

    public function getClient(): ClientInterface;

    public function getLogger(): LoggerInterface;
}
