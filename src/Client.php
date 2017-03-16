<?php

namespace BecosoftApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class Api
 * @package BecosoftApi
 */
class Api implements ClientInterface
{

    /**
     *
     */
    const BASE_URI = 'http://api.fashionpro.becosoft.net/api/';

    /**
     *
     */
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
            $gateway = new Gateway(new Client([
                'base_uri' => self::BASE_URI,
                'timeout' => self::TIMEOUT,
                'debug' => env('APP_DEBUG'),
                'headers' => [
                    'Apikey' => $apiKey,
                    'Content-type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]), Log::getMonolog());
        }

        $this->gateway = $gateway;
        $this->apiKey = $apiKey;
    }

    /**
     * @return GatewayInterface
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @param RequestInterface $request
     * @param array $options
     * @return ResponseInterface
     */
    public function send(RequestInterface $request, array $options = [])
    {
        return $this->gateway->getClient()->send($request, $options);
    }

    /**
     * @param RequestInterface $request
     * @param array $options
     * @return PromiseInterface
     */
    public function sendAsync(RequestInterface $request, array $options = [])
    {
        return $this->gateway->getClient()->sendAsync($request, $options);
    }

    /**
     * @param string $method
     * @param UriInterface|string $uri
     * @param array $options
     * @return ResponseInterface
     */
    public function request($method, $uri, array $options = [])
    {
        return $this->gateway->getClient()->request($method, $uri, $options);
    }

    /**
     * @param string $method
     * @param UriInterface|string $uri
     * @param array $options
     * @return PromiseInterface
     */
    public function requestAsync($method, $uri, array $options = [])
    {
        return $this->gateway->getClient()->requestAsync($method, $uri, $options);
    }

    /**
     * @param null $option
     * @return mixed
     */
    public function getConfig($option = null)
    {
        return $this->gateway->getClient()->getConfig($option);
    }
}
