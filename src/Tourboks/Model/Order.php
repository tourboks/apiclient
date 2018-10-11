<?php

namespace Tourboks\Model;

class Order
{
    private $_orderID;
    private $_totalOrderCost;
    private $_totalOrderCostInTransactionCurrency;
    private $_totalOrderCostNet;
    private $_totalOrderCostNetInCurrency;
    private $_bookingReferences;
    private $_orderItems;
    private $_status;

    public function __construct($order)
    {
        $this->setOrderID($order['orderId'] ?: $order['id']);
        $this->setStatus($order['orderStatus']);
        $this->setTotalOrderCost($order['total_order_cost']);
        $this->setTotalOrderCostInTransactionCurrency($order['total_order_cost_in_currency']);
        $this->setTotalOrderCostNet($order['total_order_cost_net']);
        $this->setTotalOrderCostNetInCurrency($order['total_order_cost_net_in_currency']);
        $this->setBookingReferences($order['bookingReferences']);
        $this->setOrderItems($order['orderItems'] ?: $order['orderItem']);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->_orderID;
    }

    /**
     * @param mixed $orderID
     */
    public function setOrderID($orderID)
    {
        $this->_orderID = $orderID;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderCost()
    {
        return $this->_totalOrderCost;
    }

    /**
     * @param mixed $totalOrderCost
     */
    public function setTotalOrderCost($totalOrderCost)
    {
        $this->_totalOrderCost = $totalOrderCost;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderCostInTransactionCurrency()
    {
        return $this->_totalOrderCostInTransactionCurrency;
    }

    /**
     * @param mixed $totalOrderCostInTransactionCurrency
     */
    public function setTotalOrderCostInTransactionCurrency($totalOrderCostInTransactionCurrency)
    {
        $this->_totalOrderCostInTransactionCurrency = $totalOrderCostInTransactionCurrency;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderCostNet()
    {
        return $this->_totalOrderCostNet;
    }

    /**
     * @param mixed $totalOrderCostNet
     */
    public function setTotalOrderCostNet($totalOrderCostNet)
    {
        $this->_totalOrderCostNet = $totalOrderCostNet;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderCostNetInCurrency()
    {
        return $this->_totalOrderCostNetInCurrency;
    }

    /**
     * @param mixed $totalOrderCostNetInCurrency
     */
    public function setTotalOrderCostNetInCurrency($totalOrderCostNetInCurrency)
    {
        $this->_totalOrderCostNetInCurrency = $totalOrderCostNetInCurrency;
    }

    /**
     * @return mixed
     */
    public function getBookingReferences()
    {
        return $this->_bookingReferences;
    }

    /**
     * @param mixed $bookingReferences
     */
    public function setBookingReferences($bookingReferences)
    {
        $this->_bookingReferences = $bookingReferences;
    }

    /**
     * @return mixed
     */
    public function getOrderItems()
    {
        return $this->_orderItems;
    }

    /**
     * @param mixed $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->_orderItems = $orderItems;
    }

}