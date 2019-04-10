<?php
namespace KevinEm\LimeLightCRM\Services;

use KevinEm\LimeLightCRM\v1\LimeLightCRM;

class ProspectService
{
    /**
     * @var LimeLightCRM
     */
    protected $v1Engine;
    /**
     * @var \KevinEm\LimeLightCRM\v2\LimeLightCRM
     */
    protected $v2Engine;

    public function __construct(LimeLightCRM $v1Engine, \KevinEm\LimeLightCRM\v2\LimeLightCRM $v2Engine)
    {
        $this->v1Engine = $v1Engine;
        $this->v2Engine = $v2Engine;
    }

    public function addProspectWithCustomFields($prospectData, array $customFields = [])
    {
        $resp = $this->v1Engine
            ->prospects()
            ->newProspect($prospectData);

        $prospectId = $resp['prospectId'];

        $cfResp = $this->v2Engine
            ->prospects()
            ->addCustomFieldValues($prospectId, $customFields);
    }
}