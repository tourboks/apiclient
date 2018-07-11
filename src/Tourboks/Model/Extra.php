<?php

namespace Tourboks\Model;

class Extra
{
    private $_id;
    private $_title;
    private $_price;

    public function __construct($extra)
    {
        $this->setId($extra['id']);
        $this->setTitle($extra['title']);
        if ($extra["price"] && count($extra["price"]) > 0 ) {
            $pricing = [];
            foreach ($extra["price"] as $price) {
                $pricing[] = new ExtraPricing($price);
            }
            $this->setPrice($pricing);
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
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
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