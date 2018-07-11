<?php

namespace Tourboks\Request;

use Tourboks\Http\RawResponse;
use Tourboks\TourboksRequest;

class ProductDetails extends TourboksRequest
{
    public function __construct($params = [], $body = NULL)
    {
        $endpoint = '/products/' . $params['product_id'] . '/' . $params['locale_id'] . '/' . $params['currency'];
        parent::__construct('GET', $endpoint);
    }

    /**
     * @return \Tourboks\Response\ProductDetails
     */
    public function perform()
    {
        return parent::perform();
    }

    /**
     * @param $rawResponse RawResponse
     * @return \Tourboks\Response\ProductDetails
     */
    function handleResponse($rawResponse)
    {
        return new \Tourboks\Response\ProductDetails(
                    $this,
                    $rawResponse->getBody(),
                    $rawResponse->getHttpResponseCode(),
                    $rawResponse->getHeaders()
        );
    }

}
