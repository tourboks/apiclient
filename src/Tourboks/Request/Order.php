<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class Order extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/orders/' . $params['order_id'];
        parent::__construct('GET', $endpoint, $body);
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
     * @return \Tourboks\Response\Order
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\Order(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
