<?php

declare(strict_types=1);

namespace BecosoftApi;

use GuzzleHttp\ClientInterface;

interface ApiInterface extends ClientInterface
{

    public const BASE_URI = 'http://api.fashionpro.becosoft.net/api/';

    public const TIMEOUT = 5.0;
}
