<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Media;

class MediaTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $media = [
            'id' => 3,
            'mime' => 'image/jpeg',
            'url' => 'pic.jpg',
            'embed' => 'vid.mp4',
            'width' => '2048',
            'height' => '1029',
            'title' => 'the Danube Folk Ensemble',
        ];
        $media = new Media($media);
        $this->assertEquals(3, $media->getId());
        $this->assertEquals('image/jpeg', $media->getMime());
        $this->assertEquals('pic.jpg', $media->getUrl());
        $this->assertEquals('vid.mp4', $media->getEmbed());
        $this->assertEquals('2048', $media->getWidth());
        $this->assertEquals('1029', $media->getHeight());
        $this->assertEquals('the Danube Folk Ensemble', $media->getTitle());
    }

}