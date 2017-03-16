<?php

namespace BecosoftApi\Entity;

use BecosoftApi\Api;

/**
 * Class AbstractEntity
 * @package BecosoftApi\Entity
 */
abstract class AbstractEntity
{
    /**
     * @var string
     */
    protected static $endpoint;

    /**
     * @var Api
     */
    protected $api;

    /**
     * AbstractEntity constructor.
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param array $query
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(array $query = [], array $options = [])
    {
        if ($query) {
            $options['query'] = $query;
        }

        return $this->api->request('GET', static::$endpoint, $options);
    }
}
