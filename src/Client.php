<?php

namespace BecosoftApi;

use GuzzleHttp\Client;

/**
 * Class Api
 * @package BecosoftApi
 */
class Api
{

    const BASE_URI = 'http://api.fashionpro.becosoft.net/api/';

    const TIMEOUT = 5.0;

    /**
     * @var GatewayInterface
     */
    private $gateway;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * Api constructor.
     * @param GatewayInterface|null $gateway
     */
    public function __construct($apiKey, GatewayInterface $gateway = null)
    {
        if ($gateway === null) {
            $client = new Client([
                'base_uri' => self::BASE_URI,
                'timeout' => self::TIMEOUT,
                'headers' => [
                    'Apikey' => $apiKey,
                    'Content-type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);
        }

        $this->gateway = $gateway;
        $this->apiKey = $apiKey;
    }

}
