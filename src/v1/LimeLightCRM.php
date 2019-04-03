<?php


namespace KevinEm\LimeLightCRM\v1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;

/**
 * Class ApiClient
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
        $this->baseUrl  = $options['base_url'];
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
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeRequest(string $method, array $data, string $httpMethod)
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
     * @return array
     */
    public function parseResponse($response)
    {
        $array = [];

        /*$exploded = explode('&', $response);

        foreach ($exploded as $explode) {
            $line = explode('=', $explode);

            if (isset($line[1])) {
                $array[$line[0]] = urldecode($line[1]);
            } else {
                $array[] = $explode;
            }
        }*/

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

    /**
     * @return Credentials
     */
    public function credentials()
    {
        return new Credentials($this);
    }

    /**
     * @return Products
     */
    public function products()
    {
        return new Products($this);
    }

    /**
     * @return Shippings
     */
    public function shippings()
    {
        return new Shippings($this);
    }

    /**
     * @return Campaigns
     */
    public function campaigns()
    {
        return new Campaigns($this);
    }

    /**
     * @return Prospects
     */
    public function prospects()
    {
        return new Prospects($this);
    }

    /**
     * @return Payments
     */
    public function payments()
    {
        return new Payments($this);
    }

    /**
     * @return Orders
     */
    public function orders()
    {
        return new Orders($this);
    }

    /**
     * @return Customers
     */
    public function customers()
    {
        return new Customers($this);
    }
}