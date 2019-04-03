<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Payments
 * @package KevinEm/LimeLightCRM/v1
 */
class Payments extends AbstractService
{
    /**
     * @return array
     */
    public function authorizePayment()
    {
        return $this->makeRequest('authorize_payment', []);
    }

    /**
     * @param array $gatewayIds
     * @return array
     */
    public function gatewayView(array $gatewayIds)
    {
        return $this->makeRequest('gateway_view', ['gateway_id' => $gatewayIds]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAlternativeProvider(array $data)
    {
        return $this->makeRequest('get_alternative_provider', $data);
    }

    /**
     * @param $paymentRouterId
     * @return array
     */
    public function paymentRouterView($paymentRouterId)
    {
        return $this->makeRequest('payment_router_view', ['payment_router_id' => $paymentRouterId]);
    }

    /**
     * @param $orderId
     * @return array
     */
    public function threeDRedirect($orderId)
    {
        return $this->makeRequest('three_d_redirect', ['order_id' => $orderId]);
    }
}