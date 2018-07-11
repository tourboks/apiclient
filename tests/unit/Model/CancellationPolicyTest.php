<?php

namespace Tests\Unit\Model;

require_once(dirname(__FILE__) . '/../../TestBase.php');
use PHPUnit\Framework\TestCase;
use Tourboks\Model\CancellationPolicy;

class CancellationPolicyTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $cancellationPolicy = [
            'cancelUpTo' => '3600',
            'cancelChargePerc' => '25'
        ];
        $cancellationPolicy = new CancellationPolicy($cancellationPolicy);
        $this->assertEquals('3600', $cancellationPolicy->getCancelUpTo());
        $this->assertEquals('25', $cancellationPolicy->getCancelChargePerc());
    }

}