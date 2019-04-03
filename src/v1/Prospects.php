<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Prospects
 * @package KevinEm/LimeLightCRM/v1
 */
class Prospects extends AbstractService
{
   /**
     * @param array $data
     * @return array
     */
    public function newProspect(array $data)
    {
        return $this->makeRequest('new_prospect', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function prospectFind(array $data)
    {
        return $this->makeRequest('prospect_find', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function prospectUpdate(array $data)
    {
        return $this->makeRequest('prospect_update', $data);
    }

    /**
     * @param $prospectId
     * @return array
     */
    public function prospectView($prospectId)
    {
        return $this->makeRequest('prospect_view', ['prospect_id' => $prospectId]);
    }

}