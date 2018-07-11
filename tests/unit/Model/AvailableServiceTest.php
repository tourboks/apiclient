<?php
namespace Tests\Unit\Model;

require_once(dirname(__FILE__) . '/../../TestBase.php');

use Tests\TestBase;
use Tourboks\Model\AvailableService;

class AvailableServiceTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $availableService = [
            'id' => 5,
            'title' => 'Portuguese'
        ];
        $availableService = new AvailableService($availableService);
        $this->assertEquals('5', $availableService->getId());
        $this->assertEquals('Portuguese', $availableService->getTitle());
    }

}