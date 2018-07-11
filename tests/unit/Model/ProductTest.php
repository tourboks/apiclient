<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Product;

class ProductTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $product = [
            'id' => 5,
            'shortDescription' => 'Short Desc',
            'onlinePrice' => '50',
            'retailPrice' => '50',
            'netPrice' => '50',
            'productStatus' => 5,
            'latitude' => '59.56',
            'longitude' => '59.60',
            'zoom' => 15,
            'seoUrl' => 'product-tour',
            'startDate' => '2018-09-28',
            'endDate' => '2018-09-30',
            'startTime' => '05:59',
            'timeslots' => [[
                'id' => 54,
                'timeFrom' => '2018-08-28',
                'timeTo' => '2018-09-28',
                'seasonID' => 6,
            ]],
            'pricingSeasons' => [[
                'id' => 1866,
                'dateFrom' => '60',
                'dateTo' => '60',
            ]],
            'pricings' => [[
                'pricingSeasonID' => 1866,
                'timeslotID' => 8,
                'variantID' => 9,
                'netPrice' => '60',
                'onlinePrice' => '60',
                'retailPrice' => '60',
                'personType' => '0',
            ]],
            'postCode' => '1051',
            'duration' => 4200,
            'minimumCapacity' => 1,
            'maximumCapacity' => 20,
            'exactDate' => 0,
            'difficulty' => '5',
            'bookingLeadTimeMin' => 20,
            'bookingLeadTimeMax' => 300,
            'isBestSeller' => 1,
            'isBirthdateRequired' => 1,
            'isIdRequired' => 1,
            'hasHotelPickup' => 1,
            'isNameRequired' => 1,
            'category' => 0,
            'subCategory' => 1,
            'schedule' => [[
                'startDate' => '2018-08-28',
                'endDate' => '2018-09-28',
                'weekdays' => '0010001',
            ]],
            'variants' => [[
                'id' => 54,
                'title' => 'Summer',
            ]],
            'blockOutDates' => [[
                'startDate' => '2018-09-28',
                'endDate' => '2018-10-28'
            ]],
            'media' => [[
                'id' => 3,
                'mime' => 'image/jpeg',
                'url' => 'pic.jpg',
                'embed' => 'vid.mp4',
                'width' => '2048',
                'height' => '1029',
                'title' => 'the Danube Folk Ensemble',
            ]],
            'waypoints' => [[
                'latitude' => '56,59',
                'longitude' => '56,60',
                'type' => 'S',
                'description' => 'Start',
            ]],
            'cancellationPolicy' => [[
                'cancelUpTo' => '3600',
                'cancelChargePerc' => '25'
            ]],
            'availableServices' => [[
                'id' => 5,
                'title' => 'Portuguese'
            ]],
            'liveGuides' => [[
                'id' => 3,
                'language' => 'Greek',
                'dateFrom' => '2018-08-28',
                'dateTo' => '2018-09-28',
                'days' => '0101010',
                'price' => '20',
                'pricings' => [[
                    'price' => '35',
                    'personType' => '0',
                    'dayIndex' => 5,
                ]],
            ]],
            'hasDisabledAccess' => 'Wheel chair accessible',
            'targetGroup' => 'Everyone',
            'title' => 'Title',
            'overview' => 'Overview',
            'highlights' => 'Highlights',
            'inclusion' => 'Inclusion',
            'exclusion' => 'Exclusion',
            'itinarery' => 'Itinerary',
            'gettingThere' => 'Getting There',
            'notes' => 'Notes',
            'address' => 'Address',
            'timezone' => 'Europe/Budapest',
            'city' => 'Athens',
            'country' => 'Greece',
            'categories' => [[
                'id' => 5,
                'title' => 'Couples'
            ]],
            'persons' => [[
                'personType' => '0',
                'personDescription' => 'Adult',
                'netPrice' => '60',
                'fromPrice' => '60',
            ]],
            'reviews' => [[
                'title' => 'Positive Review',
                'rating' => 8,
                'user' => '9',
                'date' => '60',
                'description' => 'Positive Desc',
            ]],
            'source' => 'Tourboks',
            'isTourboks' => 1,
            'distance' => '20',
            'rating' => '5',
            'extras' => [[
                'id' => 6,
                'title' => 'Extra Ticket',
                'price' => [[
                    'netPrice' => '20.00',
                    'onlinePrice' => '30.00',
                    'personType' => '0',
                    'personDescription' => 'Adult',
                ]],
            ]],
        ];
        $product = new Product($product);

        $this->assertEquals(5, $product->getProductId());
        $this->assertEquals('Short Desc', $product->getShortDescription());
        $this->assertEquals('50', $product->getOnlinePrice());
        $this->assertEquals('50', $product->getRetailPrice());
        $this->assertEquals('50', $product->getNetPrice());
        $this->assertEquals(5, $product->getProductStatus());
        $this->assertEquals('59.56', $product->getLatitude());
        $this->assertEquals('59.60', $product->getLongitude());

        $this->assertEquals(15, $product->getZoom());
        $this->assertEquals('product-tour', $product->getProductUrl());
        $this->assertEquals('2018-09-28', $product->getStartDate());
        $this->assertEquals('2018-09-30', $product->getEndDate());
        $this->assertEquals('05:59', $product->getStartTime());
        $this->assertInstanceOf('Tourboks\Model\Timeslot', $product->getTimeslots()[0]);
        $this->assertInstanceOf('Tourboks\Model\PricingSeason', $product->getPricingSeasons()[0]);
        $this->assertInstanceOf('Tourboks\Model\Pricing', $product->getPricings()[0]);
        $this->assertEquals('1051', $product->getPostCode());
        $this->assertEquals(4200, $product->getDuration());
        $this->assertEquals(1, $product->getMinimumCapacity());
        $this->assertEquals(20, $product->getMaximumCapacity());
        $this->assertEquals(0, $product->getExactDate());
        $this->assertEquals('5', $product->getDifficulty());
        $this->assertEquals(20, $product->getBookingLeadTimeMin());
        $this->assertEquals(300, $product->getBookingLeadTimeMax());
        $this->assertEquals(1, $product->getisBestSeller());
        $this->assertEquals(1, $product->getIsBirthdateRequired());
        $this->assertEquals(1, $product->getIsNameRequired());
        $this->assertEquals(0, $product->getPricingCategory());
        $this->assertEquals(1, $product->getPricingSubCategory());
        $this->assertInstanceOf('Tourboks\Model\Schedule', $product->getSchedule()[0]);
        $this->assertInstanceOf('Tourboks\Model\Variant', $product->getVariants()[0]);
        $this->assertInstanceOf('Tourboks\Model\Extra', $product->getExtras()[0]);
        $this->assertInstanceOf('Tourboks\Model\BlockOutDate', $product->getBlockOutDates()[0]);
        $this->assertInstanceOf('Tourboks\Model\Media', $product->getMedia()[0]);
        $this->assertInstanceOf('Tourboks\Model\Waypoint', $product->getWayPoints()[0]);
        $this->assertInstanceOf('Tourboks\Model\CancellationPolicy', $product->getCancellationPolicy()[0]);
        $this->assertInstanceOf('Tourboks\Model\AvailableService', $product->getAvailableServices()[0]);
        $this->assertInstanceOf('Tourboks\Model\LiveGuide', $product->getLiveGuides()[0]);
        $this->assertEquals('Wheel chair accessible', $product->getHasDisabledAccess());
        $this->assertEquals('Everyone', $product->getTargetGroup());
        $this->assertEquals('Title', $product->getTitle());
        $this->assertEquals('Overview', $product->getOverview());
        $this->assertEquals('Highlights', $product->getHighlights());
        $this->assertEquals('Inclusion', $product->getInclusions());
        $this->assertEquals('Exclusion', $product->getExclusions());
        $this->assertEquals('Itinerary', $product->getItinerary());
        $this->assertEquals('Notes', $product->getNotes());
        $this->assertEquals('Getting There', $product->getGettingThere());
        $this->assertEquals('Address', $product->getAddress());
        $this->assertEquals('Europe/Budapest', $product->getTimezone());
        $this->assertEquals('Athens', $product->getCity());
        $this->assertEquals('Greece', $product->getCountry());
        $this->assertInstanceOf('Tourboks\Model\Category', $product->getCategories()[0]);
        $this->assertInstanceOf('Tourboks\Model\Person', $product->getPersons()[0]);
        $this->assertInstanceOf('Tourboks\Model\Review', $product->getReviews()[0]);

        $this->assertEquals('Tourboks', $product->getSource());
        $this->assertEquals(1, $product->getIsTourboks());
        $this->assertEquals('20', $product->getDistance());
        $this->assertEquals('5', $product->getRating());
    }
}