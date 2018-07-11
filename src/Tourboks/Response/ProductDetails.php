<?php

namespace Tourboks\Response;

use Tourboks\Model\Product;
use Tourboks\TourboksResponse;

class ProductDetails extends TourboksResponse
{
    /**
     * @return Product
     */
    public function getData()
    {
        return new Product($this->getBody());
    }
}
