<?php

namespace BecosoftApi;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class Api
 * @package BecosoftApi
 */
class Api implements ApiInterface
{

    /**
     * @var GatewayInterface
     */
    private $gateway;

    /**
     * Api constructor.
     * @param GatewayInterface $gateway
     */
    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
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
