<?php

namespace Tourboks\Response;

use Tourboks\Model\Order;
use Tourboks\Model\OrderItem;
use Tourboks\TourboksResponse;

class OrderCreate extends TourboksResponse
{
    /**
     * @return Order
     */
    public function getData()
    {
        $body = $this->getBody();
        $order = new Order($body);
        foreach ($body['orderItem'] as $orderItem) {
            $orderItems = [];
            $orderItems[] = new OrderItem($orderItem);
            $order->setOrderItems($orderItems);
        }
        return $order;
    }
}
