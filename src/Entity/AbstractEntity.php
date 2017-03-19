<?php

namespace BecosoftApi\Entity;

use BecosoftApi\Api;

/**
 * Class AbstractEntity
 * @package BecosoftApi\Entity
 */
abstract class AbstractEntity
{
    const PER_CALL = 50;

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

    /**
     * @param array $query
     * @param array $options
     * @return array
     */
    public function getAll(array $query = [], array $options = [])
    {
        if ($query) {
            $options['query'] = $query;
        }

        $entities = [];
        $options['query']['take'] = self::PER_CALL;

        $skip = 0;
        do {
            $options['query']['skip'] = $skip;

            $result = $this->api->request('GET', static::$endpoint, $options);
            $decoded = json_decode($result->getBody()->getContents());
            $entities = array_merge($entities, $decoded);

            $skip++;
        } while (count($decoded) === self::PER_CALL);

        return $entities;
    }
}
