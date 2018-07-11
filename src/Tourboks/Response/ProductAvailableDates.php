<?php

namespace Tourboks\Response;

use Tourboks\Model\Product;
use Tourboks\TourboksResponse;

class ProductAvailableDates extends TourboksResponse
{
    /**
     * @return Product[]
     */
    public function getData()
    {
        $body = $this->getBody();
        return $body['dates'];
    }
}
