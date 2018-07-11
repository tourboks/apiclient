![Latest Stable Version](http://img.shields.io/badge/Latest%20Stable-1.0-blue.svg)

# Tourboks API Client Library for PHP #

## Description ##
This repository contains the API client library that allows you to access the Tourboks platform from your PHP app.

## Requirements ##
* [PHP 5.4.0 or higher](http://www.php.net/)

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require tourboks/apiclient
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### Basic Example ###

```php
<?php

require_once(dirname(__FILE__) . '/vendor/autoload.php');

// Note: Before go live change environment to LIVE
$config = new Tourboks\TourboksConfig([
    'member_username' => 'test',
    'member_password' => 'test',
    'environment' => 'STAGING',
]);

$requestParameters = [
    'product_id' => 23,
    'locale_id' => 1,
    'currency' => 'EUR',
];
$request = new Tourboks\Request\ProductDetails($requestParameters);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


$body = [
    'localeId' => '',
    'format' => '',
    'pageNumber' => 1,
    'keyword' => '',
    'category' => '',
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
    'distanceFrom' => '',
    'hasConfirmation' => '',
    'showTestProducts' => '',
];
$request = new Tourboks\Request\ProductSearch([], $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


$body = [
    'productId' => '23',
    'dateFrom' => '2018-08-12',
    'dateTo' => '2018-10-30'
];
$request = new Tourboks\Request\ProductAvailableDates([], $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}

$body = [
    "productId" => "23",
    "date" => "2018-08-13",
    "currency" => "EUR",
    "persons" => [
        "personType" => "0",
        "numItems" => "2"
    ]
];
$request = new Tourboks\Request\ProductAvailability([], $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


$body = [
    "isInvoice" => 0,
    "addressAdditional" => "",
    "zip" => "10077",
    "title" => 0,
    "mytbIds" => "",
    "country" => 199,
    "currency" => "EUR",
    "city" => "Taipei ",
    "vat" => "",
    "activity" => "",
    "products" => [[
        "variantId" => "0",
        "extras" => [],
        "componentKey" => "",
        "id" => 23,
        "timeslots" => 14449,
        "personType" => [[
            "personType" => "0",
            "numItems" => "1"
        ]],
        "dateSelected" => "2018-08-13",
        "additionalInfo" => [[
            "id" => "",
            "bdate" => "",
            "name" => "",
            "hotel" => ""
        ]],
        "temporaryDate" => ""
    ]],
    "state" => " ",
    "localeId" => 2,
    "format" => "",
    "email" => "test@tourboks.com",
    "memberType" => 0,
    "phone" => "930666277",
    "companyName" => "",
    "firstName" => "Tsi Chao ",
    "remarks" => "",
    "memberId" => 321,
    "lastName" => "Yu",
    "address" => "Adress",
    "irs" => ""
];
$request = new Tourboks\Request\OrderCreate([], $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


$body = [
    "transactionToken" => 987,
    "transactionDate" => "2018-08-01",
];
$requestParameters = [
    'order_id' => 5495,
];
$request = new Tourboks\Request\OrderPay($requestParameters, $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


$body = [
    "currency" => 'EUR',
    "localeId" => 1,
    "format" => 1,
];
$request = new Tourboks\Request\MyOrders([], $body);
$request->setConfig($config);
try {
    $response = $request->perform();
    $data = $response->getData();
} catch (\Tourboks\Exceptions\TourboksResponseException $e) {
    $message = $e->getMessage();
}


```