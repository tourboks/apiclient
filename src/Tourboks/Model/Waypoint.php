<?php

namespace Tourboks\Model;

class Waypoint
{
    private $_latitude;
    private $_longitude;
    private $_type;
    private $_description;

    public function __construct($waypoint)
    {
        $this->setLatitude($waypoint['latitude']);
        $this->setLongitude($waypoint['longitude']);
        $this->setType($waypoint['type']);
        $this->setDescription($waypoint['description']);
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->_latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->_longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

}