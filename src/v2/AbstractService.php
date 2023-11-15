<?php

namespace KevinEm\LimeLightCRM\v2;

abstract class AbstractService
{
    public function __construct(protected LimeLightCRM $apiClient)
    {
    }

    /**
     * @param string $url
     * @param array  $data
     * @param string $httpMethod
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function makeRequest(string $url, array $data, string $httpMethod = 'POST'): array
    {
        return $this->apiClient->makeRequest($url, $data, $httpMethod);
    }
}
