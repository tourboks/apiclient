<?php

namespace Tourboks\Response;

use Tourboks\Model\Order;
use Tourboks\TourboksResponse;

class OrderCreate extends TourboksResponse
{
    /**
     * @return Order
     */
    public function getData()
    {
        return new Order($this->getBody());
    }
}
