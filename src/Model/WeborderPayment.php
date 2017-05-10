<?php

namespace BecosoftApi\Model;

/**
 * Class WeborderPayment
 * @package BecosoftApi\Model
 */
class WeborderPayment extends AbstractModel
{
    /**
     * @var string
     */
    public $Betalingswijze;

    /**
     * @var bool
     */
    public $giftvoucher;

    /**
     * @var string
     */
    public $vouchercode;

    /**
     * @var string
     */
    public $betaaltransactienr;

    /**
     * @var float
     */
    public $bedrag;

    /**
     * @var int
     */
    public $ecombetalingid;
}
