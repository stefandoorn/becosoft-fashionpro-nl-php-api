<?php

declare(strict_types=1);

namespace BecosoftApi;

use Psr\Log\LoggerInterface;

interface GatewayFactoryInterface
{
    public static function get($apiKey, $debug = false, LoggerInterface $logger): GatewayInterface;
}
