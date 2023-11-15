<?php

namespace KevinEm\LimeLightCRM\v1;

/**
 * Class Shippings
 * @package KevinEm/LimeLightCRM/v1
 */
class Shippings extends AbstractService
{
    public function repostToFulfillment($orderId)
    {
        return $this->makeRequest('repost_to_fulfillment', ['order_id' => $orderId]);
    }

    public function shippingMethodFind(array $data)
    {
        return $this->makeRequest('shipping_method_find', $data);
    }

    public function shippingMethodView($shippingId)
    {
        return $this->makeRequest('shipping_method_view', ['shipping_id' => $shippingId]);
    }
}
