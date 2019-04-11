<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Prospects
 * @package KevinEm/LimeLightCRM/v1
 */
class Prospects extends AbstractService
{
    public function newProspect(array $data)
    {
        return $this->makeRequest('new_prospect', $data);
    }

    public function prospectFind(array $data)
    {
        return $this->makeRequest('prospect_find', $data);
    }

     public function prospectUpdate(array $data)
    {
        return $this->makeRequest('prospect_update', $data);
    }

    public function prospectView($prospectId)
    {
        return $this->makeRequest('prospect_view', ['prospect_id' => $prospectId]);
    }

}