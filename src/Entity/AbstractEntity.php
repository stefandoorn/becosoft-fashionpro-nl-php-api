<?php

namespace BecosoftApi\Entity;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;

/**
 * Class AbstractEntity
 * @package BecosoftApi\Entity
 */
abstract class AbstractEntity implements EntityInterface
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
     * @param ApiInterface $api
     */
    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $query = [], array $options = [])
    {
        if (!empty($query)) {
            $options = $this->setOptions($query, $options);
        }

        return $this->api->request('GET', static::$endpoint, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll(array $query = [], array $options = [])
    {
        $options['query']['take'] = self::PER_CALL;

        if (!empty($query)) {
            $options = $this->setOptions($query, $options);
        }

        $entities = [];

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

    /**
     * @param array $query
     * @param array $options
     * @return array
     */
    private function setOptions(array $query, array $options)
    {
        if (array_key_exists('query', $options)) {
            $query = array_merge($options['query'], $query);
        }

        $options['query'] = $query;

        return $options;
    }
}
