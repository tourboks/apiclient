<?php

namespace Tourboks;

use Tourboks\Exceptions\TourboksResponseException;
use Tourboks\Http\ResponseCodes;

abstract class TourboksResponse
{
    protected $httpStatusCode;

    protected $headers;

    protected $body;

    protected $request;

    protected $thrownException;


    public function __construct(TourboksRequest $request, $body = null, $httpStatusCode = null, array $headers = [])
    {
        $this->request = $request;
        $this->body = $body;
        $this->httpStatusCode = $httpStatusCode;
        $this->headers = $headers;
    }

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Return the HTTP status code for this response.
     *
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Return the HTTP headers for this response.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Return the raw body response.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    abstract public function getData();

    public function getHttpResponseCode()
    {
        return $this->httpResponseCode;
    }

    /**
     * Returns true if Graph returned an error message.
     *
     * @return boolean
     */
    public function isError()
    {
        return $this->getHttpStatusCode() !== ResponseCodes::HTTP_OK;
    }

    /**
     * @param RawResponse $response
     *
     * @return TourboksResponseException
     */
    public function getThrownException($response)
    {
        throw new TourboksResponseException($response);
    }


}
