<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class ProductAvailableDates extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/products/availability/dates';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\ProductAvailableDates
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\ProductAvailableDates
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\ProductAvailableDates(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
