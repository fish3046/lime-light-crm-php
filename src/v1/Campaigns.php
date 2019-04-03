<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Campaigns
 * @package KevinEm/LimeLightCRM/v1
 */
class Campaigns extends AbstractService
{
    /**
     * @return array
     */
    public function campaignFindActive()
    {
        return $this->makeRequest('campaign_find_active', []);
    }

    /**
     * @param int $campaignId
     * @return array
     */
    public function campaignView(int $campaignId)
    {
        return $this->makeRequest('campaign_view', ['campaign_id' => $campaignId]);
    }

}