<?php

namespace Tourboks\Model;

class CancellationPolicy
{
    private $_cancelUpTo;
    private $_cancelChargePerc;

    public function __construct($cancellationPolicy)
    {
        $this->setCancelUpTo($cancellationPolicy['cancelUpTo']);
        $this->setCancelChargePerc($cancellationPolicy['cancelChargePerc']);
    }

    /**
     * @return mixed
     */
    public function getCancelUpTo()
    {
        return $this->_cancelUpTo;
    }

    /**
     * @param mixed $cancelUpTo
     */
    public function setCancelUpTo($cancelUpTo)
    {
        $this->_cancelUpTo = $cancelUpTo;
    }

    /**
     * @return mixed
     */
    public function getCancelChargePerc()
    {
        return $this->_cancelChargePerc;
    }

    /**
     * @param mixed $cancelChargePerc
     */
    public function setCancelChargePerc($cancelChargePerc)
    {
        $this->_cancelChargePerc = $cancelChargePerc;
    }


}