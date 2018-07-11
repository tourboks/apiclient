<?php

namespace Tourboks\Model;

class PricingSeason
{
    private $_id;
    private $_dateFrom;
    private $_dateTo;

    public function __construct($pricing)
    {
        $this->setId($pricing['id']);
        $this->setDateFrom($pricing['dateFrom']);
        $this->setDateTo($pricing['dateTo']);
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
    public function getDateFrom()
    {
        return $this->_dateFrom;
    }

    /**
     * @param mixed $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->_dateFrom = $dateFrom;
    }

    /**
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->_dateTo;
    }

    /**
     * @param mixed $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->_dateTo = $dateTo;
    }

}