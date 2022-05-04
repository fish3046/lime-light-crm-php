<?php

namespace KevinEm\LimeLightCRM\v2;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException;

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
        $this->baseUrl  = rtrim((string)$options['base_url'], '\\');
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
     * @throws LimeLightCRMGenericException
     * @throws LimeLightCRMParseResponseException
     */
    public function makeRequest(string $url, array $data, string $httpMethod = 'POST'): array
    {
        $authParams = $this->getAuth();
        $formParams = $this->buildFormParams($data);
        $url        = $this->getBaseUrl() . $url;

        $requestOptions = array_merge($authParams, $formParams);

        try {
            $res    = $this->getResponse($httpMethod, $url, $requestOptions);
            $parsed = $this->parseResponse($res);
        } catch (BadResponseException $ex) {
            $res    = $ex->getResponse()->getBody()->getContents();
            $parsed = $this->parseResponse($res);

            // Try and pull error message from response body
            $message = '';
            if (isset($parsed['message'])) {
                $message = $parsed['message'];
            }

            throw new LimeLightCRMGenericException($message, $ex->getResponse()->getStatusCode(), $ex, $parsed);
        }

        return $parsed;
    }

    /**
     * @return array
     */
    public function getAuth(): array
    {
        return [
            RequestOptions::AUTH => [$this->username, $this->password],
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
    public function getResponse($method, $uri, array $options = []): string
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
     * @throws LimeLightCRMParseResponseException
     */
    public function parseResponse($response)
    {
        $array = json_decode($response, true);

        if (is_null($array)) {
            throw new LimeLightCRMParseResponseException('Cannot understand limelight response', 0, null);
        }

        return $array;
    }

    public function prospects(): Prospects
    {
        return new Prospects($this);
    }
}
