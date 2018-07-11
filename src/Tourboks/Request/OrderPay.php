<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class OrderPay extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/orders/' . $params['order_id'] . '/pay';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\OrderPay
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\OrderPay
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\OrderPay(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
