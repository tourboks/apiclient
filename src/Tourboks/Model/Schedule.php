<?php

namespace Tourboks\Model;

class Schedule
{
    private $_startDate;
    private $_endDate;
    private $_weekdays;

    public function __construct($schedule)
    {
        $this->setStartDate($schedule['startDate']);
        $this->setEndDate($schedule['endDate']);
        $this->setWeekdays($schedule['weekdays']);
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->_startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->_startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->_endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->_endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getWeekdays()
    {
        return $this->_weekdays;
    }

    /**
     * @param mixed $weekdays
     */
    public function setWeekdays($weekdays)
    {
        $this->_weekdays = $weekdays;
    }

}