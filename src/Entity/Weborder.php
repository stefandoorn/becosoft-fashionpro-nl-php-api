<?php

namespace BecosoftApi\Entity;

/**
 * Class Weborder
 * @package BecosoftApi\Entity
 */
class Weborder extends AbstractEntity implements EntityInterface
{
    protected static $endpoint = 'Weborder';
    protected static $idField = 'orderID';
}
