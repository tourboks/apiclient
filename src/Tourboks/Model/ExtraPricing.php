<?php

namespace Tourboks\Model;

class ExtraPricing
{
    private $_personType;
    private $_personDescription;
    private $_onlinePrice;
    private $_netPrice;

    public function __construct($extraPricing)
    {
        $this->setPersonType($extraPricing['personType']);
        $this->setPersonDescription($extraPricing['personDescription']);
        $this->setOnlinePrice($extraPricing['onlinePrice']);
        $this->setNetPrice($extraPricing['netPrice']);
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
    public function getPersonDescription()
    {
        return $this->_personDescription;
    }

    /**
     * @param mixed $personDescription
     */
    public function setPersonDescription($personDescription)
    {
        $this->_personDescription = $personDescription;
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