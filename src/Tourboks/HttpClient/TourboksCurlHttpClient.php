<?php

namespace Tourboks\HttpClient;

use Tourboks\Exceptions\TourboksSDKException;
use Tourboks\Http\RawResponse;
use Tourboks\TourboksConfig;

class TourboksCurlHttpClient
{
    protected $curlErrorMessage = '';

    protected $curlErrorCode = 0;

    protected $rawResponse;

    protected $tourboksCurl;

    public function __construct(tourboksCurl $tourboksCurl = null)
    {
        $this->tourboksCurl = new TourboksCurl();
    }

    public function send($url, $method, $body, array $headers, $timeOut, $memberCredentials, $environment)
    {
        $this->openConnection($url, $method, $body, $headers, $timeOut, $memberCredentials, $environment);
        $this->sendRequest();

        if ($curlErrorCode = $this->tourboksCurl->errno()) {
            throw new TourboksSDKException($this->tourboksCurl->error(), $curlErrorCode);
        }

        // Separate the raw headers from the raw body
        list($rawHeaders, $rawBody) = $this->extractResponseHeadersAndBody();

        $this->closeConnection();

        return new RawResponse($rawHeaders, $rawBody);
    }

    public function openConnection($url, $method, $body, array $headers, $timeOut, $memberCredentials, $environment)
    {
        $options = [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->compileRequestHeaders($headers),
            CURLOPT_URL => $url,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => $timeOut,
            CURLOPT_RETURNTRANSFER => TRUE, // Return response as string
            CURLOPT_HEADER => TRUE, // Enable header processing
            CURLOPT_SSL_VERIFYHOST =>  $environment === TourboksConfig::ENVIRONMENT_LIVE ? 2 : FALSE,
            CURLOPT_SSL_VERIFYPEER => $environment === TourboksConfig::ENVIRONMENT_LIVE ? TRUE : FALSE,
            CURLOPT_USERPWD => $memberCredentials['member_username'] . ":" . $memberCredentials['member_password']
        ];
        if ($method !== "GET") {
            $options[CURLOPT_POSTFIELDS] = json_encode($body);
            $options[CURLOPT_POST] =1;
        }

        $this->tourboksCurl->init();
        $this->tourboksCurl->setoptArray($options);
    }

    /**
     * Closes an existing curl connection
     */
    public function closeConnection()
    {
        $this->tourboksCurl->close();
    }

    /**
     * Send the request and get the raw response from curl
     */
    public function sendRequest()
    {
        $this->rawResponse = $this->tourboksCurl->exec();
    }

    /**
     * Compiles the request headers into a curl-friendly format.
     *
     * @param array $headers The request headers.
     *
     * @return array
     */
    public function compileRequestHeaders(array $headers)
    {
        $return = [];

        foreach ($headers as $key => $value) {
            $return[] = $key . ': ' . $value;
        }

        return $return;
    }

    /**
     * Extracts the headers and the body into a two-part array
     *
     * @return array
     */
    public function extractResponseHeadersAndBody()
    {
        $parts = explode("\r\n\r\n", $this->rawResponse);
        $rawBody = array_pop($parts);
        $rawHeaders = implode("\r\n\r\n", $parts);

        return [trim($rawHeaders), trim($rawBody)];
    }
}
