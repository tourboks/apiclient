<?php

namespace Tourboks\Model;

class Timeslot
{
    private $_id;
    private $_timeFrom;
    private $_timeTo;
    private $_seasonID;
    private $_componentKey;
    private $_durationTime;
    private $_onlinePrice;
    private $_netPrice;

    public function __construct($timeslot)
    {
        $this->setId($timeslot['id']);
        $this->setTimeFrom($timeslot['timeFrom']);
        $this->setTimeTo($timeslot['timeTo']);
        $this->setSeasonID($timeslot['seasonID']);
        $this->setComponentKey($timeslot['componentKey']);
        $this->setDurationTime($timeslot['durationTime']);
        $this->setOnlinePrice($timeslot['onlinePrice']);
        $this->setNetPrice($timeslot['netPrice']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getTimeFrom()
    {
        return $this->_timeFrom;
    }

    /**
     * @param mixed $timeFrom
     */
    public function setTimeFrom($timeFrom)
    {
        $this->_timeFrom = $timeFrom;
    }

    /**
     * @return mixed
     */
    public function getTimeTo()
    {
        return $this->_timeTo;
    }

    /**
     * @param mixed $timeTo
     */
    public function setTimeTo($timeTo)
    {
        $this->_timeTo = $timeTo;
    }

    /**
     * @return mixed
     */
    public function getSeasonID()
    {
        return $this->_seasonID;
    }

    /**
     * @param mixed $seasonID
     */
    public function setSeasonID($seasonID)
    {
        $this->_seasonID = $seasonID;
    }

    /**
     * @return mixed
     */
    public function getComponentKey()
    {
        return $this->_componentKey;
    }

    /**
     * @param mixed $componentKey
     */
    public function setComponentKey($componentKey)
    {
        $this->_componentKey = $componentKey;
    }

    /**
     * @return mixed
     */
    public function getDurationTime()
    {
        return $this->_durationTime;
    }

    /**
     * @param mixed $durationTime
     */
    public function setDurationTime($durationTime)
    {
        $this->_durationTime = $durationTime;
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