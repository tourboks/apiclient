<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class ProductSearch extends TourboksRequest
{
    public function __construct($params = [], $body = [])
    {
        $endpoint = '/products';
        parent::__construct('POST', $endpoint, $body);
    }

    /**
     * @return \Tourboks\Response\ProductSearch
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\ProductSearch
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\ProductSearch(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
