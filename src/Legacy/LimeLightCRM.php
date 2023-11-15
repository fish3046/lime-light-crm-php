<?php

namespace KevinEm\LimeLightCRM\Legacy;

use GuzzleHttp\ClientInterface;

/**
 * This is for use with the old legacy API.
 * Documentation found here: https://developer-legacy-prod.sticky.io/
 *
 * @package KevinEm\LimeLightCRM\Legacy
 */
class LimeLightCRM
{
    protected ClientInterface $httpClient;
    protected string $baseUrl = '';
    protected string $username = '';
    protected string $password = '';

    protected Membership $membership;
    protected Transaction $transaction;

    public function __construct(ClientInterface $client, array $options)
    {
        // Prep authentication options
        $this->baseUrl  = $options['base_url'];
        $this->username = $options['username'];
        $this->password = $options['password'];

        $this->setHttpClient($client);

        // Prep service classes
        $this->membership  = new Membership($this);
        $this->transaction = new Transaction($this);
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getResponse(string $method, $uri, array $options = []): string
    {
        $res = $this->getHttpClient()->request($method, $uri, $options);

        return $res->getBody()->getContents();
    }

    /**
     * @param $method
     * @param array $data
     * @return array
     */
    public function buildFormParams($method, array $data = []): array
    {
        return [
            'form_params' => array_merge_recursive($this->getDefaultFormParams(), compact('method'), $data)
        ];
    }

    public function getDefaultFormParams(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    /**
     * Parse response returned by LimeLightCRM into an array
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response): array
    {
        $array = [];

        $exploded = explode('&', $response);

        foreach ($exploded as $explode) {
            $line = explode('=', $explode);

            if (isset($line[1])) {
                $array[$line[0]] = urldecode($line[1]);
            } else {
                $array[] = $explode;
            }
        }

        return $array;
    }

    public function membership(): Membership
    {
        return $this->membership;
    }

    public function transaction(): Transaction
    {
        return $this->transaction;
    }
}
