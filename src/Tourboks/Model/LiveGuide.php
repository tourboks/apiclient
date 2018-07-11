<?php

namespace Tourboks\Model;

class LiveGuide
{
    private $_id;
    private $_language;
    private $_dateFrom;
    private $_dateTo;
    private $_days;
    private $_pricings;
    private $_price;

    public function __construct($liveGuide)
    {
        $this->setId($liveGuide['id']);
        $this->setLanguage($liveGuide['language']);
        $this->setDateFrom($liveGuide['dateFrom']);
        $this->setDateTo($liveGuide['dateTo']);
        $this->setDays($liveGuide['days']);
        if ($liveGuide["pricings"] && count($liveGuide["pricings"]) > 0) {
            $pricings = [];
            foreach ($liveGuide["pricings"] as $pricing) {
                $pricings[] = new LiveGuidePricing($pricing);
            }
            $this->setPricings($pricings);
        }
        if ($liveGuide["price"]) {
            $this->setPrice($liveGuide["price"]);
        }
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
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->_language = $language;
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

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->_days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->_days = $days;
    }

    /**
     * @return mixed
     */
    public function getPricings()
    {
        return $this->_pricings;
    }

    /**
     * @param LiveGuidePricing[] $pricing
     */
    public function setPricings($pricing)
    {
        $this->_pricings = $pricing;
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

}