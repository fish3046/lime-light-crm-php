<?php

namespace KevinEm\LimeLightCRM\v1;

abstract class AbstractService
{
    public function __construct(protected LimeLightCRM $apiClient)
    {
    }

    /**
     * @param string $method
     * @param array  $data
     * @param string $httpMethod
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException
     */
    protected function makeRequest(string $method, array $data, string $httpMethod = 'POST'): Response
    {
        return $this->apiClient->makeRequest($method, $data, $httpMethod);
    }
}
