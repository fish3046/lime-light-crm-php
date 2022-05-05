<?php

namespace KevinEm\LimeLightCRM\Services;

use KevinEm\LimeLightCRM\v1\LimeLightCRM;

/**
 * Helper functions for dealing with prospects
 *
 * @package KevinEm\LimeLightCRM\Services
 */
class ProspectService
{
    protected LimeLightCRM $v1Engine;
    protected \KevinEm\LimeLightCRM\v2\LimeLightCRM $v2Engine;

    public function __construct(LimeLightCRM $v1Engine, \KevinEm\LimeLightCRM\v2\LimeLightCRM $v2Engine)
    {
        $this->v1Engine = $v1Engine;
        $this->v2Engine = $v2Engine;
    }

    /**
     * @param       $prospectData
     * @param array $customFields
     * @return int                  Prospect ID
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addProspectWithCustomFields($prospectData, array $customFields = []): int
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
