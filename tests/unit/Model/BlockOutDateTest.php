<?php

namespace Tests\Unit\Model;

require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\BlockOutDate;

class BlockOutDateTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $blockOutDate = [
            'startDate' => '2018-09-28',
            'endDate' => '2018-10-28'
        ];
        $blockOutDate = new BlockOutDate($blockOutDate);
        $this->assertEquals('2018-09-28', $blockOutDate->getStartDate());
        $this->assertEquals('2018-10-28', $blockOutDate->getEndDate());
    }
}