<?php

namespace Tourboks\Model;

class LiveGuidePricing
{
    private $_price;
    private $_personType;
    private $_dayIndex;

    public function __construct($liveGuidePricing)
    {
        $this->setPrice($liveGuidePricing['price']);
        $this->setPersonType($liveGuidePricing['personType']);
        $this->setDayIndex($liveGuidePricing['dayIndex']);
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
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
    public function getDayIndex()
    {
        return $this->_dayIndex;
    }

    /**
     * @param mixed $dayIndex
     */
    public function setDayIndex($dayIndex)
    {
        $this->_dayIndex = $dayIndex;
    }

}