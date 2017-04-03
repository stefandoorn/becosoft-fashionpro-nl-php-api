<?php

namespace BecosoftApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class GatewayFactory.
 */
class GatewayFactory implements GatewayFactoryInterface
{
    /**
     * @inheritDoc
     */
    public static function get($apiKey, $debug = false, LoggerInterface $logger = null)
    {
        if ($logger === null) {
            $logger = new NullLogger();
        }

        return new Gateway(new Client([
            'base_uri' => ApiInterface::BASE_URI,
            'timeout' => ApiInterface::TIMEOUT,
            'debug' => $debug,
            'headers' => [
                'Apikey' => $apiKey,
                'Content-type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]), $logger);
    }
}
