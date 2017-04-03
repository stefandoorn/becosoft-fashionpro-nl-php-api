<?php

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;

/**
 * Interface ApiInterface
 * @package BecosoftApi
 */
interface ApiInterface extends ClientInterface
{

    /**
     *
     */
    const BASE_URI = 'http://api.fashionpro.becosoft.net/api/';

    /**
     *
     */
    const TIMEOUT = 5.0;
}
