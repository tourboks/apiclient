<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class OrderCreate extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/orders/create';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\OrderCreate
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\OrderCreate
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\OrderCreate(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
