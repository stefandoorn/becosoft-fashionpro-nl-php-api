<?php

namespace BecosoftApi\Entity;

/**
 * Interface EntityInterface
 * @package BecosoftApi\Entity
 */
interface EntityInterface
{
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