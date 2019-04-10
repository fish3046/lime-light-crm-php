<?php

namespace KevinEm\LimeLightCRM\v2;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;

/**
 * For use with version 2 of limelight API
 * Documentation found here: https://developer-v2.limelightcrm.com
 *
 * @package KevinEm\LimeLightCRM\v2
 */
class LimeLightCRM
{

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * LimeLightCRM constructor.
     *
     * @param ClientInterface $client
     * @param array  $options
     */
    public function __construct(ClientInterface $client, array $options)
    {
        $this->baseUrl  = rtrim($options['base_url'], '\\');
        $this->username = $options['username'];
        $this->password = $options['password'];

        $this->setHttpClient($client);
    }

    /**
     * make request
     *
     * @param string $url
     * @param array  $data
     * @param string $httpMethod
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeRequest(string $url, array $data, string $httpMethod = 'POST'): array
    {
        $authParams = $this->getAuth();
        $formParams = $this->buildFormParams($data);
        $url        = $this->getBaseUrl() . $url;

        $requestOptions = array_merge($authParams, $formParams);

        // We need to either wrap the guzzle execution in a try...catch or turn HTTP_ERRORS exceptions
        // off so the calling project can deal with the body themselves.
        $requestOptions[RequestOptions::HTTP_ERRORS] = false;

        $res     = $this->getResponse($httpMethod, $url, $requestOptions);
        $parsed  = $this->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return [
            RequestOptions::AUTH => [$this->username,$this->password],
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function buildFormParams($data = false): array
    {
        return ($data) ? [RequestOptions::FORM_PARAMS => $data] : [];
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param       $method
     * @param       $uri
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getResponse($method, $uri, array $options = [])
    {
        $res = $this->getHttpClient()->request($method, $uri, $options);

        return $res->getBody()->getContents();
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param ClientInterface $httpClient
     * @return $this
     */
    public function setHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * Parse response returned by LimeLightCRM into an array
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response)
    {
        $array = json_decode($response, true);

        return $array;
    }

    /**
     * @param array $response
     * @throws LimeLightCRMTransactionException
     */
    public function checkResponse(array $response)
    {
        /*$exception = null;

        if (isset($response['response_code'])) {
            $responses = explode(',', $response['response_code']);

            foreach ($responses as $code) {
                if (!in_array($code, [100])) {
                    $exception = new LimeLightCRMTransactionException($code, $exception, $response);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }*/
    }

    public function prospects()
    {
        return new Prospects($this);
    }
}