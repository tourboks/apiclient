<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\Order;

class OrderTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $order = [
            'orderId' => 1866,
            'total_order_cost' => '60',
            'total_order_cost_in_currency' => '60',
            'total_order_cost_net' => '60',
            'total_order_cost_net_in_currency' => '60',
            'bookingReferences' => ['GB-000170-465-5499-5286'],
            'orderItems' => [[
                'id' => 1866,
                'productId' => 505,
                'title' => 'Athens Shopping Tour',
                'currency' => 'EUR',
                'totalProductCost' => '20',
                'media' => [
                    'id' => 3,
                    'mime' => 'image/jpeg',
                    'url' => 'pic.jpg',
                    'embed' => 'vid.mp4',
                    'width' => '2048',
                    'height' => '1029',
                    'title' => 'the Danube Folk Ensemble',
                ],
                'dateSelected' => '2017-06-13',
                'downloadInvoiceUrl' => 'downloadInvoice.pdf',
                'downloadVoucherUrl' => 'downloadVoucher.pdf',
                'invoiceUrl' => 'invoice.pdf',
                'voucherUrl' => 'voucher.pdf',
            ]],
        ];
        $order = new Order($order);
        $this->assertEquals(1866, $order->getOrderID());
        $this->assertEquals('60', $order->getTotalOrderCost());
        $this->assertEquals('60', $order->getTotalOrderCostInTransactionCurrency());
        $this->assertEquals('60', $order->getTotalOrderCostNet());
        $this->assertEquals('60', $order->getTotalOrderCostNetInCurrency());
        $this->assertInternalType('array', $order->getBookingReferences());
    }

}