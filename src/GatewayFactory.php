<?php

declare(strict_types=1);

namespace BecosoftApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class GatewayFactory implements GatewayFactoryInterface
{
    public static function get($apiKey, $debug = false, LoggerInterface $logger = null): GatewayInterface
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
