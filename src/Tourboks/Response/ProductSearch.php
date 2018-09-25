<?php

namespace Tourboks\Response;

use Tourboks\Model\Product;
use Tourboks\TourboksResponse;

class ProductSearch extends TourboksResponse
{
    /**
     * @return Product[]
     */
    public function getData()
    {
        $items = $this->getBody()['item'];
        $products = [];
        if ($items) {
            foreach ($items as $item) {
                $products[] = new Product($item);
            }
        }
        return $products;
    }
    
    /**
     * @return totalPages
     */
    public function getTotalPages()
    {
        $totalPages = $this->getBody()['totalPages'];
        return $totalPages;
    }
    
    /**
     * @return totalRecords
     */
    public function getTotalRecords()
    {
        $totalRecords = $this->getBody()['totalRecords'];
        return $totalRecords;
    }
}
