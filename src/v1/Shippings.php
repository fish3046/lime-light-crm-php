<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Shippings
 * @package KevinEm/LimeLightCRM/v1
 */
class Shippings extends AbstractService
{
    /**
     * @param $orderId
     * @return array
     */
    public function repostToFulfillment($orderId)
    {
        return $this->makeRequest('repost_to_fulfillment', ['order_id' => $orderId]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function shippingMethodFind(array $data)
    {
        return $this->makeRequest('shipping_method_find', $data);
    }

    /**
     * @param $shippingId
     * @return array
     */
    public function shippingMethodView($shippingId)
    {
        return $this->makeRequest('shipping_method_view', ['shipping_id' => $shippingId]);
    }

}