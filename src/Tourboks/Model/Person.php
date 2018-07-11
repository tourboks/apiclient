<?php

namespace Tourboks\Model;

class Person
{
    private $_personDescription;
    private $_personType;
    private $_fromPrice;
    private $_netPrice;

    public function __construct($person)
    {
        $this->setPersonDescription($person['personDescription']);
        $this->setPersonType($person['personType']);
        $this->setFromPrice($person['fromPrice']);
        $this->setNetPrice($person['netPrice']);
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
    public function getFromPrice()
    {
        return $this->_fromPrice;
    }

    /**
     * @param mixed $fromPrice
     */
    public function setFromPrice($fromPrice)
    {
        $this->_fromPrice = $fromPrice;
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