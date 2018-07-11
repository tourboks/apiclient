<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Person;

class PersonTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $person = [
            'personType' => '0',
            'personDescription' => 'Adult',
            'netPrice' => '60',
            'fromPrice' => '60',
        ];
        $person = new Person($person);
        $this->assertEquals('0', $person->getPersonType());
        $this->assertEquals('Adult', $person->getPersonDescription());
        $this->assertEquals('60', $person->getNetPrice());
        $this->assertEquals('60', $person->getFromPrice());
    }
}