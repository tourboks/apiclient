<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\LiveGuidePricing;

class LiveGuidePricingTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $liveGuidePricing = [
            'price' => '35',
            'personType' => '0',
            'dayIndex' => 5,
        ];
        $liveGuidePricing = new LiveGuidePricing($liveGuidePricing);
        $this->assertEquals('35', $liveGuidePricing->getPrice());
        $this->assertEquals('0', $liveGuidePricing->getPersonType());
        $this->assertEquals(5, $liveGuidePricing->getDayIndex());
    }

}