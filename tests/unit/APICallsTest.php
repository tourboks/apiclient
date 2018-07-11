<?php
require_once(dirname(__FILE__) . '/../../vendor/autoload.php');
require_once(dirname(__FILE__) . '/../TestCaseTrait.php');

use PHPUnit\Framework\TestCase;
use Tourboks\TourboksRequest;
use Tourboks\Url\TourboksUrlManipulator;

class APICallsTestCase extends TestCase
{
    use Tests\Unit\TestCaseTrait;

    public function _getRequestConfig()
    {
        return new Tourboks\TourboksConfig([
            'member_username' => 'test',
            'member_password' => 'test',
            'environment' => 'STAGING',
        ]);
    }
    public function testProductSearchCall()
    {
        $body = [
            'localeId' => '2',
            'format' => '',
            'pageNumber' => 1,
            'keyword' => '',
            'category' => [],
            'sportTeam' => '',
            'dateFrom' => '',
            'dateTo' => '',
            'language' => '',
            'priceFrom' => '',
            'priceTo' => '',
            'durationFrom' => '',
            'durationTo' => '',
            'isBestSeller' => '',
            'meetTheLocals' => '',
            'distanceFrom' => [],
            'hasConfirmation' => '',
            'showTestProducts' => 0
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/productSearch.json', true);
        $request = new \Tourboks\Request\ProductSearch([], $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $this->assertEquals($url, $request->getUrl());

        $this->assertEquals('/products', $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $products = $response->getData();
        $product = $products[0];
        $this->assertInstanceOf('Tourboks\Model\Product', $product);

        $media = $product->getMedia()[0];
        $this->assertInstanceOf('Tourboks\Model\Media', $media);

        $category = $product->getCategories()[0];
        $this->assertInstanceOf('Tourboks\Model\Category', $category);

        $availableService = $product->getAvailableServices()[0];
        $this->assertInstanceOf('Tourboks\Model\AvailableService', $availableService);
    }

    public function testProductDetailsCallProductWithAllParameters()
    {
        $requestParameters = [
            'product_id' => 23,
            'locale_id' => 1,
            'currency' => 'EUR',
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/productDetails.json', true);
        $request = new Tourboks\Request\ProductDetails($requestParameters);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/products/' . $requestParameters['product_id'] . '/' . $requestParameters['locale_id'] . '/' . $requestParameters['currency'];
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals(NULL, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $product = $response->getData();
        $this->assertInstanceOf('Tourboks\Model\Product', $product);

        $timeslot = $product->getTimeslots()[0];
        $this->assertInstanceOf('Tourboks\Model\Timeslot', $timeslot);

        $pricingSeason = $product->getPricingSeasons()[0];
        $this->assertInstanceOf('Tourboks\Model\PricingSeason', $pricingSeason);

        $pricing = $product->getPricings()[0];
        $this->assertInstanceOf('Tourboks\Model\Pricing', $pricing);

        $schedule = $product->getSchedule()[0];
        $this->assertInstanceOf('Tourboks\Model\Schedule', $schedule);

        $variant = $product->getVariants()[0];
        $this->assertInstanceOf('Tourboks\Model\Variant', $variant);

        $blockOutDate = $product->getBlockOutDates()[0];
        $this->assertInstanceOf('Tourboks\Model\BlockOutDate', $blockOutDate);

        $media = $product->getMedia()[0];
        $this->assertInstanceOf('Tourboks\Model\Media', $media);

        $wayPoint = $product->getWayPoints()[0];
        $this->assertInstanceOf('Tourboks\Model\WayPoint', $wayPoint);

        $cancellationPolicy = $product->getCancellationPolicy()[0];
        $this->assertInstanceOf('Tourboks\Model\CancellationPolicy', $cancellationPolicy);

        $availableService = $product->getAvailableServices()[0];
        $this->assertInstanceOf('Tourboks\Model\AvailableService', $availableService);

        $liveGuide = $product->getLiveGuides()[0];
        $this->assertInstanceOf('Tourboks\Model\LiveGuide', $liveGuide);

        $category = $product->getCategories()[0];
        $this->assertInstanceOf('Tourboks\Model\Category', $category);

        $person = $product->getPersons()[0];
        $this->assertInstanceOf('Tourboks\Model\Person', $person);
    }

    public function testProductAvailableDatesCall()
    {
        $body = [
            'productId' => '23',
            'dateFrom' => '2018-08-12',
            'dateTo' => '2018-10-30'
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/productAvailableDates.json', true);
        $request = new Tourboks\Request\ProductAvailableDates([], $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/products/availability/dates';
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $availableDates = $response->getData();
        $this->assertInternalType('array', $availableDates);
    }

    public function testProductAvailabilityCall()
    {
        $body = [
            'productId' => '23',
            'date' => '2018-08-13',
            'currency' => 'EUR',
            'persons' => [
                'personType' => '0',
                'numItems' => '2'
            ]
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/productAvailability.json', true);
        $request = new Tourboks\Request\ProductAvailability([], $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/products/availability';
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $product = $response->getData();
        $this->assertInstanceOf('Tourboks\Model\Product', $product);

        $timeslot = $product->getTimeslots()[0];
        $this->assertInstanceOf('Tourboks\Model\Timeslot', $timeslot);

        $extra = $product->getExtras()[0];
        $this->assertInstanceOf('Tourboks\Model\Extra', $extra);

        $liveGuide = $product->getLiveGuides()[0];
        $this->assertInstanceOf('Tourboks\Model\LiveGuide', $liveGuide);
    }

    public function testOrdersCreateCall()
    {
        $body = [
            'isInvoice' => 0,
            'addressAdditional' => '',
            'zip' => '10077',
            'title' => 0,
            'mytbIds' => '',
            'country' => 199,
            'currency' => 'EUR',
            'city' => 'Taipei ',
            'vat' => '',
            'activity' => '',
            'products' => [[
                'variantId' => '0',
                'extras' => [],
                'componentKey' => '',
                'id' => 23,
                'timeslots' => 14449,
                'personType' => [[
                    'personType' => '0',
                    'numItems' => '1'
                ]],
                'dateSelected' => '2018-08-13',
                'additionalInfo' => [[
                    'id' => '',
                    'bdate' => '',
                    'name' => '',
                    'hotel' => ''
                ]],
                'temporaryDate' => ''
            ]],
            'state' => '',
            'localeId' => 2,
            'format' => '',
            'email' => 'test@tourboks.com',
            'memberType' => 0,
            'phone' => '930666277',
            'companyName' => '',
            'firstName' => 'Tsi Chao ',
            'remarks' => '',
            'memberId' => 321,
            'lastName' => 'Yu',
            'address' => 'Adress',
            'irs' => ''
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/orderCreate.json', true);
        $request = new Tourboks\Request\OrderCreate([], $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/orders/create';
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $order = $response->getData();
        $this->assertInstanceOf('Tourboks\Model\Order', $order);
    }

    public function testOrdersPayCall()
    {
        $body = [
            'transactionToken' => 987,
            'transactionDate' => '2018-08-01',
        ];
        $requestParameters = [
            'order_id' => 2266,
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/orderPay.json', true);
        $request = new Tourboks\Request\OrderPay($requestParameters, $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/orders/' . $requestParameters['order_id'] . '/pay';
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $data = $response->getData();
        $this->assertInternalType('array', $data);

    }

    public function testMyOrdersCall()
    {
        $body = [
            'currency' => 'EUR',
            'localeId' => 1,
            'format' => 1,
        ];
        $serverResponse = file_get_contents(dirname(__FILE__) . '/Fixture/myOrders.json', true);
        $request = new Tourboks\Request\MyOrders([], $body);
        $request->setConfig($this->_getRequestConfig());
        $url = TourboksRequest::BASE_AUTHORIZATION_URL_STAGING .
            TourboksUrlManipulator::forceSlashPrefix($request->getApiVersion()) .
            TourboksUrlManipulator::forceSlashPrefix($request->getEndpoint());
        $endpoint = '/orders';
        $this->assertEquals($url, $request->getUrl());
        $this->assertEquals($endpoint, $request->getEndpoint());
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, $request->getBody());
        $this->assertInternalType('array', $request->getMemberCredentials());

        $mockClient = $this->_getMock('Tourboks\TourboksClient', [
            'sendRequest' => new \Tourboks\Http\RawResponse([], $serverResponse, 200)
        ]);
        $request->setClient($mockClient);
        $response = $request->perform();
        $orders = $response->getData();
        $this->assertInternalType('array', $orders);
        $order = $orders[0];
        $this->assertInstanceOf('Tourboks\Model\Order', $order);
        $orderItem = $order->getOrderItems()[0];
        $this->assertInstanceOf('Tourboks\Model\OrderItem', $orderItem);
    }
}