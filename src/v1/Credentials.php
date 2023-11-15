<?php

namespace KevinEm\LimeLightCRM\v1;

/**
 * Class Credentials
 * @package KevinEm/LimeLightCRM/v1
 */
class Credentials extends AbstractService
{
    public function validateCredentials(): Response
    {
        return $this->makeRequest('validate_credentials', []);
    }
}
