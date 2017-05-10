<?php

namespace BecosoftApi\Model;

/**
 * Class WeborderDetail
 * @package BecosoftApi\Model
 */
class WeborderDetail extends AbstractModel
{
    /**
     * @var int
     */
    public $aantal;

    /**
     * @var int
     */
    public $artikelnummer;

    /**
     * @var float
     */
    public $verkoopprijs;

    /**
     * @var string
     */
    public $voorraadlocatie;

    /**
     * @var string
     */
    public $retourcode;

    /**
     * @var string
     */
    public $retourreden;
}
