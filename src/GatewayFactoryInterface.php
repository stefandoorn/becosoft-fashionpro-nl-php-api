<?php

namespace BecosoftApi;

use Psr\Log\LoggerInterface;

/**
 * Interface GatewayFactoryInterface
 * @package BecosoftApi
 */
interface GatewayFactoryInterface
{
    /**
     * @param string $apiKey
     * @param bool $debug
     * @param LoggerInterface $logger
     * @return GatewayInterface
     */
    public static function get($apiKey, $debug = false, LoggerInterface $logger);
}
