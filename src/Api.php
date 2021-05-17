<?php

declare(strict_types=1);

namespace BecosoftApi;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

final class Api implements ApiInterface
{

    /**
     * @var GatewayInterface
     */
    private $gateway;

    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function getGateway(): GatewayInterface
    {
        return $this->gateway;
    }

    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->gateway->getClient()->send($request, $options);
    }

    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->gateway->getClient()->sendAsync($request, $options);
    }

    public function request($method, $uri, array $options = []): ResponseInterface
    {
        return $this->gateway->getClient()->request($method, $uri, $options);
    }

    public function requestAsync($method, $uri, array $options = []): PromiseInterface
    {
        return $this->gateway->getClient()->requestAsync($method, $uri, $options);
    }

    public function getConfig($option = null)
    {
        return $this->gateway->getClient()->getConfig($option);
    }
}
