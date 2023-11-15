<?php

namespace KevinEm\LimeLightCRM\v1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException;

/**
 * For use with version 1 of limelight API
 * Documentation found here: https://developer-prod.limelightcrm.com/
 *
 * @package KevinEm\LimeLightCRM\v1
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
     * @param string $method
     * @param array  $data
     * @param string $httpMethod
     * @return Response
     * @throws LimeLightCRMGenericException
     * @throws LimeLightCRMParseResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeRequest(string $method, array $data, string $httpMethod): Response
    {
        $authParams = $this->getAuth();

        $formParams = $this->buildFormParams($data);

        $url = $this->getUrl($method);

        $res = $this->getResponse($httpMethod, $url, array_merge($authParams, $formParams));

        $parsed = $this->parseResponse($res);

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
    public function buildFormParams($data = false)
    {
        return ($data) ? [RequestOptions::FORM_PARAMS => $data] : [];
    }

    /**
     * @param string $method
     * @return string
     */
    public function getUrl(string $method): string
    {
        return $this->getBaseUrl() . '/api/v1/' . $method;
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
     * @return Response
     * @throws LimeLightCRMParseResponseException
     */
    public function parseResponse($response): Response
    {
        $array = json_decode($response, true);

        if (is_null($array)) {
            throw new LimeLightCRMParseResponseException('Cannot understand limelight response', 0, null);
        }

        return new Response($array);
    }

    public function checkResponse(Response $response): void
    {
        if (!$response->isSuccess()) {
            $message = '';
            if (isset($response['error_message']) && is_string($response['error_message'])) {
                $message = $response['error_message'];
            } elseif (isset($response['response_message']) && is_string($response['response_message'])) {
                $message = $response['response_message'];
            }

            throw new LimeLightCRMGenericException($message, (int)$response['response_code'], null, $response->toArray());
        }
    }

    public function credentials(): Credentials
    {
        return new Credentials($this);
    }

    public function products(): Products
    {
        return new Products($this);
    }

    public function shippings(): Shippings
    {
        return new Shippings($this);
    }

    public function campaigns(): Campaigns
    {
        return new Campaigns($this);
    }

    public function prospects(): Prospects
    {
        return new Prospects($this);
    }

    public function payments(): Payments
    {
        return new Payments($this);
    }

    public function orders(): Orders
    {
        return new Orders($this);
    }

    public function customers(): Customers
    {
        return new Customers($this);
    }
}
