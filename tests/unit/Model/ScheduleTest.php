<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Schedule;

class ScheduleTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $schedule = [
            'startDate' => '2018-08-28',
            'endDate' => '2018-09-28',
            'weekdays' => '0010001',
        ];
        $schedule = new Schedule($schedule);
        $this->assertEquals('2018-08-28', $schedule->getStartDate());
        $this->assertEquals('2018-09-28', $schedule->getEndDate());
        $this->assertEquals('0010001', $schedule->getWeekdays());
    }
}