<?php

namespace KevinEm\LimeLightCRM\Services;

use GuzzleHttp\Exception\GuzzleException;
use KevinEm\LimeLightCRM\v1\LimeLightCRM;

/**
 * Helper functions for dealing with prospects
 *
 * @package KevinEm\LimeLightCRM\Services
 */
class ProspectService
{
    public function __construct(protected LimeLightCRM $v1Engine, protected \KevinEm\LimeLightCRM\v2\LimeLightCRM $v2Engine)
    {
    }

    /**
     * @param array $prospectData
     * @param array $customFields
     * @return int                  Prospect ID
     * @throws GuzzleException
     */
    public function addProspectWithCustomFields(array $prospectData, array $customFields = []): int
    {
        $resp = $this->v1Engine
            ->prospects()
            ->newProspect($prospectData);

        $prospectId = $resp['prospectId'];

        $this->v2Engine
            ->prospects()
            ->addCustomFieldValues($prospectId, $customFields);

        return (int)$prospectId;
    }
}
