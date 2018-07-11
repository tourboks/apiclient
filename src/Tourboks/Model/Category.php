<?php

namespace Tourboks\Model;

class Category
{
    private $_id;
    private $_title;

    public function __construct($category)
    {
        $this->setId($category['id']);
        $this->setTitle($category['title']);
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