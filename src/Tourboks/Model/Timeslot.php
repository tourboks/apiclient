<?php

namespace Tourboks\Model;

class Timeslot
{
    private $_id;
    private $_timeFrom;
    private $_timeTo;
    private $_seasonID;

    public function __construct($timeslot)
    {
        $this->setId($timeslot['id']);
        $this->setTimeFrom($timeslot['timeFrom']);
        $this->setTimeTo($timeslot['timeTo']);
        $this->setSeasonID($timeslot['seasonID']);
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
}