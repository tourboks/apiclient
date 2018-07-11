<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Variant;

class VariantTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $variant = [
            'id' => 54,
            'title' => 'Summer',
        ];
        $variant = new Variant($variant);
        $this->assertEquals(54, $variant->getId());
        $this->assertEquals('Summer', $variant->getTitle());
    }
}