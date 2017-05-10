<?php

namespace BecosoftApi\Entity;

/**
 * Interface EntityInterface
 * @package BecosoftApi\Entity
 */
interface EntityInterface
{
    /**
     * @param $id
     * @param array $options
     * @return string
     */
    public function getById($id, array $options = []);

    /**
     * @param string $data (JSON e.g.)
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function post($data, array $options = []);

    /**
     * @param array $query
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(array $query = [], array $options = []);

    /**
     * @param array $query
     * @param array $options
     * @return array
     */
    public function getAll(array $query = [], array $options = []);
}