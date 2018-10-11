<?php

namespace Tourboks;

use Tourboks\Exceptions\TourboksSDKException;
use Tourboks\Url\TourboksUrlManipulator;

abstract class TourboksRequest
{
    const BASE_AUTHORIZATION_URL_LIVE = 'https://api.tourboks.com';
    const BASE_AUTHORIZATION_URL_STAGING = 'https://tourboks.local/api';

    protected $method;
    protected $endpoint;
    protected $body;
    protected $memberCredentials;
    protected $apiVersion;
    protected $client;
    protected $environment;

    public function __construct($method = NULL, $endpoint = NULL, $body = NULL, $apiVersion = NULL)
    {
        $this->client = new TourboksClient();
        $this->setMethod($method);
        $this->setEndpoint($endpoint);
        $this->setBody($body);
        $this->setApiVersion($apiVersion ?: TourboksConfig::DEFAULT_API_VERSION);
    }

    public function setClient($client)
    {
        $this->client = $client;
    }
    public function setMethod($method)
    {
        $this->method = $method;
    }
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }
    public function setBody($body)
    {
        $this->body = $body;
    }
    public function setMemberCredentials($memberCredentials)
    {
        $this->memberCredentials = $memberCredentials;
    }
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
    }

    public function getMethod()
    {
        return $this->method;
    }
    public function getEndpoint()
    {
        return $this->endpoint;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function getMemberCredentials()
    {
        return $this->memberCredentials;
    }
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    public function getUrl()
    {
        $this->validateMethod();

        $apiVersion = TourboksUrlManipulator::forceSlashPrefix($this->apiVersion);
        $endpoint = TourboksUrlManipulator::forceSlashPrefix($this->getEndpoint());

        $baseAuthorizationUrl = $this->getEnvironment() === TourboksConfig::ENVIRONMENT_LIVE ?
            static::BASE_AUTHORIZATION_URL_LIVE :
            static::BASE_AUTHORIZATION_URL_STAGING;
        $url = $baseAuthorizationUrl . $apiVersion . $endpoint;
        return $url;
    }

    public function validateMethod()
    {
        if (!$this->method) {
            throw new TourboksSDKException('HTTP method not specified.');
        }

        if (!in_array($this->method, ['GET', 'POST'])) {
            throw new TourboksSDKException('Invalid HTTP method specified.');
        }
    }

    public static function getDefaultHeaders()
    {
        return [
            'User-Agent' => 'tourboks-php-' . TourboksConfig::VERSION,
            'Content-Type' => 'application/json',
            'Accept-Encoding' => '*',
        ];
    }

    public function perform()
    {
        $rawResponse = $this->client->sendRequest($this);
        $returnResponse = $this->handleResponse($rawResponse);

        if ($returnResponse->isError()) {
            throw $returnResponse->getThrownException($rawResponse);
        }
        return $returnResponse;
    }

    /**
     * @param TourboksConfig $tourboksConfig
     */
    public function setConfig($tourboksConfig)
    {
        $this->setMemberCredentials($tourboksConfig->getMemberCredentials());
        $this->setEnvironment($tourboksConfig->getEnvironment());
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    abstract function handleResponse($rawResponse);
}