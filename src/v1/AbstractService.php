<?php
namespace KevinEm\LimeLightCRM\v1;

abstract class AbstractService
{
    /**
     * @var LimeLightCRM
     */
    protected $apiClient;

    /**
     * Api Client constructor.
     * @param LimeLightCRM $apiClient
     */
    public function __construct(LimeLightCRM $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @param string $method
     * @param array  $data
     * @param string $httpMethod
     * @return array
     */
    protected function makeRequest(string $method, array $data, string $httpMethod = 'POST'): array
    {
        return $this->apiClient->makeRequest($method, $data, $httpMethod);
    }
}