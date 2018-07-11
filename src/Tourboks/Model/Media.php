<?php

namespace Tourboks\Model;

class Media
{
    private $_id;
    private $_mime;
    private $_url;
    private $_embed;
    private $_width;
    private $_height;
    private $_title;

    public function __construct($media)
    {
        $this->setId($media['id']);
        $this->setMime($media['mime']);
        $this->setUrl($media['url']);
        $this->setEmbed($media['embed']);
        $this->setWidth($media['width']);
        $this->setHeight($media['height']);
        $this->setTitle($media['title']);
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
    public function getMime()
    {
        return $this->_mime;
    }

    /**
     * @param mixed $mime
     */
    public function setMime($mime)
    {
        $this->_mime = $mime;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    /**
     * @return mixed
     */
    public function getEmbed()
    {
        return $this->_embed;
    }

    /**
     * @param mixed $embed
     */
    public function setEmbed($embed)
    {
        $this->_embed = $embed;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
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