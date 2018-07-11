<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Timeslot;

class TimeslotTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $timeslot = [
            'id' => 54,
            'timeFrom' => '2018-08-28',
            'timeTo' => '2018-09-28',
            'seasonID' => 6,
        ];
        $timeslot = new Timeslot($timeslot);
        $this->assertEquals(54, $timeslot->getId());
        $this->assertEquals('2018-08-28', $timeslot->getTimeFrom());
        $this->assertEquals('2018-09-28', $timeslot->getTimeTo());
        $this->assertEquals(6, $timeslot->getSeasonID());
    }

}