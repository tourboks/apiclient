<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class ProductAvailability extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/products/availability';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\ProductAvailability
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\ProductAvailability
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\ProductAvailability(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
