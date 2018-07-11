<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Review;

class ReviewTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $review = [
            'title' => 'Positive Review',
            'rating' => 8,
            'user' => '9',
            'date' => '60',
            'description' => 'Positive Desc',
        ];
        $review = new Review($review);
        $this->assertEquals('Positive Review', $review->getTitle());
        $this->assertEquals(8, $review->getRating());
        $this->assertEquals('9', $review->getUser());
        $this->assertEquals('60', $review->getDate());
        $this->assertEquals('Positive Desc', $review->getDescription());
    }
}