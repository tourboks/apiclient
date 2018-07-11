<?php

namespace Tourboks;

use Tourboks\HttpClient\TourboksCurlHttpClient;

class TourboksClient
{
    const DEFAULT_REQUEST_TIMEOUT = 60;
    protected $httpClientHandler;

    public function __construct(TourboksCurlHttpClient $httpClientHandler = null)
    {
        if (extension_loaded('curl')) {
            $this->httpClientHandler = new TourboksCurlHttpClient();
        }
    }

    public function sendRequest(TourboksRequest $request)
    {
        $url = $request->getUrl();
        $method = $request->getMethod();
        $body = $request->getBody();
        $headers = TourboksRequest::getDefaultHeaders();
        $timeOut = static::DEFAULT_REQUEST_TIMEOUT;
        $memberCredentials = $request->getMemberCredentials();
        $environment = $request->getEnvironment();
        $rawResponse = $this->httpClientHandler->send($url, $method, $body, $headers, $timeOut, $memberCredentials, $environment);

        return $rawResponse;
    }
}