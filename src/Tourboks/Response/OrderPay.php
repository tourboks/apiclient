<?php

namespace Tourboks\Response;

use Tourboks\TourboksResponse;

class OrderPay extends TourboksResponse
{
    /**
     * @return string
     */
    public function getData()
    {
        return $this->getBody();
    }
}
