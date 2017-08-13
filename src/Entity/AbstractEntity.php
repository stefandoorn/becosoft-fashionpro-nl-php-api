<?php

namespace BecosoftApi\Entity;

use BecosoftApi\Api;
use BecosoftApi\ApiInterface;
use Webmozart\Assert\Assert;

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
     * @var string
     */
    protected static $idField;

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
    public function getById($id, array $options = [])
    {
        Assert::notNull(static::$idField);

        return $this->get([static::$idField => $id], $options)->getBody()->getContents();
    }

    /**
     * {@inheritdoc}
     */
    public function post($data, array $options = [])
    {
        if (array_key_exists('body', $options) && !empty($data)) {
            throw new \Exception('BODY key already exists in options array, supplied data is not empty');
        }

        $options['body'] = $data;

        if (!array_key_exists('Content-Type', $options)) {
            $options['Content-Type'] = 'application/json';
        }

        $response = $this->api->request('POST', static::$endpoint, $options);
        return $response->getBody()->getContents();
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
