<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');


use Tests\TestBase;
use Tourboks\Model\Category;

class CategoryTest extends TestBase
{
    public function testInitObjectFromArray()
    {
        $category = [
            'id' => 5,
            'title' => 'Couples'
        ];
        $category = new Category($category);
        $this->assertEquals('5', $category->getId());
        $this->assertEquals('Couples', $category->getTitle());
    }

}