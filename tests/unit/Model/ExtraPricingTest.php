<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\ExtraPricing;

class ExtraPricingTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $extraPricing = [
            'netPrice' => '20.00',
            'onlinePrice' => '30.00',
            'personType' => '0',
            'personDescription' => 'Adult',
        ];
        $extraPricing = new ExtraPricing($extraPricing);
        $this->assertEquals('20.00', $extraPricing->getNetPrice());
        $this->assertEquals('30.00', $extraPricing->getOnlinePrice());
        $this->assertEquals('0', $extraPricing->getPersonType());
        $this->assertEquals('Adult', $extraPricing->getPersonDescription());
    }
}