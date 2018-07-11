<?php

namespace Tourboks\Model;

class Variant
{
    private $_id;
    private $_title;

    public function __construct($variant)
    {
        $this->setId($variant['id']);
        $this->setTitle($variant['title']);
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

}