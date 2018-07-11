<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class MyOrders extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/orders';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\MyOrders
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\MyOrders
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\MyOrders(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
