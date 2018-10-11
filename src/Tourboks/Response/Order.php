<?php

namespace Tourboks\Response;

use Tourboks\Model\Order as OrderModel;
use Tourboks\Model\OrderItem;
use Tourboks\TourboksResponse;

class Order extends TourboksResponse
{
    /**
     * @return OrderModel
     */
    public function getData()
    {
        $body = $this->getBody();
        $order = new OrderModel($body);
        $orderItems = [];
        foreach ($body['orderItem'] as $orderItem) {
            $orderItems[] = new OrderItem($orderItem);
        }
        $order->setOrderItems($orderItems);
        return $order;
    }
}
