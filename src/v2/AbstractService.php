<?php
namespace KevinEm\LimeLightCRM\v2;

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