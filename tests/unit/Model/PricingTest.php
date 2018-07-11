<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Pricing;

class PricingTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $pricing = [
            'pricingSeasonID' => 1866,
            'timeslotID' => 8,
            'variantID' => 9,
            'netPrice' => '60',
            'onlinePrice' => '60',
            'retailPrice' => '60',
            'personType' => '0',
        ];
        $pricing = new Pricing($pricing);
        $this->assertEquals(1866, $pricing->getPricingSeasonID());
        $this->assertEquals(8, $pricing->getTimeslotID());
        $this->assertEquals(9, $pricing->getVariantID());
        $this->assertEquals('60', $pricing->getNetPrice());
        $this->assertEquals('60', $pricing->getOnlinePrice());
        $this->assertEquals('60', $pricing->getRetailPrice());
        $this->assertEquals('0', $pricing->getPersonType());
    }
}