<?php

declare(strict_types=1);

namespace BecosoftApi\Model;

use Illuminate\Support\Collection;

final class Weborder extends AbstractModel
{
    /**
     * @var int
     */
    public $WeborderId;

    /**
     * @var int
     */
    public $Klantnummer;

    /**
     * @var \DateTime
     */
    public $Datum;

    /**
     * @var string
     */
    public $verkoper;

    /**
     * @var bool
     */
    public $Afgehandeld;

    /**
     * @var string
     */
    public $opmerkingorder;

    /**
     * @var int
     */
    public $leveringsadres;

    /**
     * @var string
     */
    public $ordertype;

    /**
     * @var float
     */
    public $totaal;

    /**
     * @var int
     */
    public $verzendtype;

    /**
     * @var string
     */
    public $kortingcode;

    /**
     * @var string
     */
    public $LeveradresNaam;

    /**
     * @var string
     */
    public $LeveradresStraat;

    /**
     * @var string
     */
    public $LeveradresExtraAdreslijn;

    /**
     * @var string
     */
    public $LeveradresLand;

    /**
     * @var string
     */
    public $LeveradresPostcode;

    /**
     * @var string
     */
    public $LeveradresPlaats;

    /**
     * @var string
     */
    public $LeveradresHuisnummer;

    /**
     * @var string
     */
    public $LeveradresBus;

    /**
     * @var string
     */
    public $Email;

    /**
     * @var int
     */
    public $ecomklantid;

    /**
     * @var string
     */
    public $ecomRemark;

    /**
     * @var string
     */
    public $ecomCurrency;

    /**
     * @var string
     */
    public $kialaPointID;

    /**
     * @var string
     */
    public $kialaName;

    /**
     * @var bool
     */
    public $avondlevering;

    /**
     * @var Collection|WeborderDetail[]
     */
    public $Details;

    /**
     * @var Collection|WeborderPayment[]
     */
    public $Payments;

    public function __construct()
    {
        $this->Details = new Collection();
        $this->Payments = new Collection();
    }
}
