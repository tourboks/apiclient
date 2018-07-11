<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\Extra;

class ExtraTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $extra = [
            'id' => 6,
            'title' => 'Extra Ticket',
            'price' => [[
                'netPrice' => '20.00',
                'onlinePrice' => '30.00',
                'personType' => '0',
                'personDescription' => 'Adult',
            ]],
        ];
        $extra = new Extra($extra);
        $this->assertEquals(6, $extra->getId());
        $this->assertEquals('Extra Ticket', $extra->getTitle());
        $this->assertInstanceOf('Tourboks\Model\ExtraPricing', $extra->getPrice()[0]);
    }
}