<?php
namespace Tourboks\Exceptions;
use Tourboks\Http\RawResponse;

class TourboksResponseException extends TourboksSDKException
{

    public function __construct(RawResponse $response, TourboksSDKException $previousException = null)
    {
        /**
         * @var $data array
         */
        $data = $response->getBody();

        //$errorMessage = $data['status']['message'];
        $errorCode  = $data['status']['id'] ?: $response->getHttpResponseCode();
        $errorDescription  = $data['status']['errorDescription'];

        parent::__construct($errorDescription, $errorCode, $previousException);
    }
}