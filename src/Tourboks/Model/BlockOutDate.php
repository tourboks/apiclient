<?php

namespace Tourboks\Model;

class BlockOutDate
{
    private $_startDate;
    private $_endDate;

    public function __construct($variant)
    {
        $this->setStartDate($variant['startDate']);
        $this->setEndDate($variant['endDate']);
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
}