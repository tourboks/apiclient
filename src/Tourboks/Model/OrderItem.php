<?php

namespace Tourboks\Model;

class OrderItem
{
    private $_orderItemId;
    private $_productId;
    private $_title;
    private $_currency;
    private $_totalProductCost;
    private $_media;
    private $_dateSelected;
    private $_downloadInvoiceUrl;
    private $_downloadVoucherUrl;
    private $_invoiceUrl;
    private $_voucherUrl;

    public function __construct($orderItem)
    {
        $this->setOrderItemId($orderItem['id']);
        $this->setProductId($orderItem['productId']);
        $this->setTitle($orderItem['title']);
        $this->setCurrency($orderItem['currency']);
        $this->setTotalProductCost($orderItem['totalProductCost']);
        $this->setMedia(new Media($orderItem['media']));
        $this->setDateSelected($orderItem['dateSelected']);
        $this->setDownloadInvoiceUrl($orderItem['downloadInvoiceUrl']);
        $this->setDownloadVoucherUrl($orderItem['downloadVoucherUrl']);
        $this->setInvoiceUrl($orderItem['invoiceUrl']);
        $this->setVoucherUrl($orderItem['voucherUrl']);
    }

    /**
     * @return mixed
     */
    public function getOrderItemId()
    {
        return $this->_orderItemId;
    }

    /**
     * @param mixed $orderItemId
     */
    public function setOrderItemId($orderItemId)
    {
        $this->_orderItemId = $orderItemId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->_productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->_currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->_currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getTotalProductCost()
    {
        return $this->_totalProductCost;
    }

    /**
     * @param mixed $totalProductCost
     */
    public function setTotalProductCost($totalProductCost)
    {
        $this->_totalProductCost = $totalProductCost;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->_media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->_media = $media;
    }

    /**
     * @return mixed
     */
    public function getDateSelected()
    {
        return $this->_dateSelected;
    }

    /**
     * @param mixed $dateSelected
     */
    public function setDateSelected($dateSelected)
    {
        $this->_dateSelected = $dateSelected;
    }

    /**
     * @return mixed
     */
    public function getDownloadInvoiceUrl()
    {
        return $this->_downloadInvoiceUrl;
    }

    /**
     * @param mixed $downloadInvoiceUrl
     */
    public function setDownloadInvoiceUrl($downloadInvoiceUrl)
    {
        $this->_downloadInvoiceUrl = $downloadInvoiceUrl;
    }

    /**
     * @return mixed
     */
    public function getDownloadVoucherUrl()
    {
        return $this->_downloadVoucherUrl;
    }

    /**
     * @param mixed $downloadVoucherUrl
     */
    public function setDownloadVoucherUrl($downloadVoucherUrl)
    {
        $this->_downloadVoucherUrl = $downloadVoucherUrl;
    }

    /**
     * @return mixed
     */
    public function getInvoiceUrl()
    {
        return $this->_invoiceUrl;
    }

    /**
     * @param mixed $invoiceUrl
     */
    public function setInvoiceUrl($invoiceUrl)
    {
        $this->_invoiceUrl = $invoiceUrl;
    }

    /**
     * @return mixed
     */
    public function getVoucherUrl()
    {
        return $this->_voucherUrl;
    }

    /**
     * @param mixed $voucherUrl
     */
    public function setVoucherUrl($voucherUrl)
    {
        $this->_voucherUrl = $voucherUrl;
    }

}