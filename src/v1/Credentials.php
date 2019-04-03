<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Credentials
 * @package KevinEm/LimeLightCRM/v1
 */
class Credentials extends AbstractService
{
    /**
     * @return array
     */
    public function validateCredentials()
    {
        return $this->makeRequest('validate_credentials', []);
    }
}