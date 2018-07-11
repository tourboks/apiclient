<?php

namespace Tourboks\Response;

use Tourboks\Model\Order;
use Tourboks\Model\OrderItem;
use Tourboks\TourboksResponse;

class MyOrders extends TourboksResponse
{
    /**
     * @return Order[]
     */
    public function getData()
    {
        $body = $this->getBody();
        $orders = [];
        foreach ($body['orders'] as $orderValue) {
            $order = new Order($orderValue);
            $orderItems = [];
            foreach ($orderValue['orderItem'] as $orderItem) {
                $orderItems[] = new OrderItem($orderItem);
            }
            $order->setOrderItems($orderItems);
            $orders[] = $order;
        }
        return $orders;
    }
}
