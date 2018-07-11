<?php

namespace Tests\Unit\Model;
require_once(dirname(__FILE__) . '/../../TestBase.php');

use PHPUnit\Framework\TestCase;
use Tourboks\Model\OrderItem;

class OrderItemTest extends TestCase
{
    public function testInitObjectFromArray()
    {
        $orderItem = [
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
        ];
        $orderItem = new OrderItem($orderItem);
        $this->assertEquals(1866, $orderItem->getOrderItemId());
        $this->assertEquals(505, $orderItem->getProductId());
        $this->assertEquals('Athens Shopping Tour', $orderItem->getTitle());
        $this->assertEquals('EUR', $orderItem->getCurrency());
        $this->assertEquals('20', $orderItem->getTotalProductCost());
        $this->assertInstanceOf('Tourboks\Model\Media', $orderItem->getMedia());

        $this->assertEquals('2017-06-13', $orderItem->getDateSelected());
        $this->assertEquals('downloadInvoice.pdf', $orderItem->getDownloadInvoiceUrl());
        $this->assertEquals('downloadVoucher.pdf', $orderItem->getDownloadVoucherUrl());
        $this->assertEquals('invoice.pdf', $orderItem->getInvoiceUrl());
        $this->assertEquals('voucher.pdf', $orderItem->getVoucherUrl());
    }
}