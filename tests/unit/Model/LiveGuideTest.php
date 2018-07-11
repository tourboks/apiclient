<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\LiveGuide;

class LiveGuideTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $liveGuide = [
            'id' => 3,
            'language' => 'Greek',
            'dateFrom' => '2018-08-28',
            'dateTo' => '2018-09-28',
            'days' => '0101010',
            'price' => '20',
            'pricings' => [[
                'price' => '35',
                'personType' => '0',
                'dayIndex' => 5,
            ]],
        ];
        $liveGuide = new LiveGuide($liveGuide);
        $this->assertEquals(3, $liveGuide->getId());
        $this->assertEquals('Greek', $liveGuide->getLanguage());
        $this->assertEquals('2018-08-28', $liveGuide->getDateFrom());
        $this->assertEquals('2018-09-28', $liveGuide->getDateTo());
        $this->assertEquals('0101010', $liveGuide->getDays());
        $this->assertEquals('20', $liveGuide->getPrice());
        $this->assertInstanceOf('Tourboks\Model\LiveGuidePricing', $liveGuide->getPricings()[0]);
    }
}