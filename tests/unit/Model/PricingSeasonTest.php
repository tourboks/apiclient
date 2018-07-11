<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\PricingSeason;

class PricingSeasonTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $pricingSeason = [
            'id' => 1866,
            'dateFrom' => '60',
            'dateTo' => '60',
        ];
        $pricingSeason = new PricingSeason($pricingSeason);
        $this->assertEquals(1866, $pricingSeason->getId());
        $this->assertEquals('60', $pricingSeason->getDateFrom());
        $this->assertEquals('60', $pricingSeason->getDateTo());
    }

}