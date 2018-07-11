<?php

namespace Tourboks\Model;

class Pricing
{
    private $_pricingSeasonID;
    private $_variantID;
    private $_timeslotID;
    private $_onlinePrice;
    private $_retailPrice;
    private $_personType;
    private $_netPrice;

    public function __construct($pricing)
    {
        $this->setPricingSeasonID($pricing['pricingSeasonID']);
        $this->setVariantID($pricing['variantID']);
        $this->setTimeslotID($pricing['timeslotID']);
        $this->setOnlinePrice($pricing['onlinePrice']);
        $this->setRetailPrice($pricing['retailPrice']);
        $this->setPersonType($pricing['personType']);
        $this->setNetPrice($pricing['netPrice']);
    }

    /**
     * @return mixed
     */
    public function getPricingSeasonID()
    {
        return $this->_pricingSeasonID;
    }

    /**
     * @param mixed $pricingSeasonID
     */
    public function setPricingSeasonID($pricingSeasonID)
    {
        $this->_pricingSeasonID = $pricingSeasonID;
    }

    /**
     * @return mixed
     */
    public function getVariantID()
    {
        return $this->_variantID;
    }

    /**
     * @param mixed $variantID
     */
    public function setVariantID($variantID)
    {
        $this->_variantID = $variantID;
    }

    /**
     * @return mixed
     */
    public function getTimeslotID()
    {
        return $this->_timeslotID;
    }

    /**
     * @param mixed $timeslotID
     */
    public function setTimeslotID($timeslotID)
    {
        $this->_timeslotID = $timeslotID;
    }

    /**
     * @return mixed
     */
    public function getOnlinePrice()
    {
        return $this->_onlinePrice;
    }

    /**
     * @param mixed $onlinePrice
     */
    public function setOnlinePrice($onlinePrice)
    {
        $this->_onlinePrice = $onlinePrice;
    }

    /**
     * @return mixed
     */
    public function getRetailPrice()
    {
        return $this->_retailPrice;
    }

    /**
     * @param mixed $retailPrice
     */
    public function setRetailPrice($retailPrice)
    {
        $this->_retailPrice = $retailPrice;
    }

    /**
     * @return mixed
     */
    public function getPersonType()
    {
        return $this->_personType;
    }

    /**
     * @param mixed $personType
     */
    public function setPersonType($personType)
    {
        $this->_personType = $personType;
    }

    /**
     * @return mixed
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }

    /**
     * @param mixed $netPrice
     */
    public function setNetPrice($netPrice)
    {
        $this->_netPrice = $netPrice;
    }


}