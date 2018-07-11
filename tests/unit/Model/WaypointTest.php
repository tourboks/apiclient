<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Waypoint;

class WaypointTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $waypoint = [
            'latitude' => '56,59',
            'longitude' => '56,60',
            'type' => 'S',
            'description' => 'Start',
        ];
        $waypoint = new Waypoint($waypoint);
        $this->assertEquals('56,59', $waypoint->getLatitude());
        $this->assertEquals('56,60', $waypoint->getLongitude());
        $this->assertEquals('S', $waypoint->getType());
        $this->assertEquals('Start', $waypoint->getDescription());

    }

}