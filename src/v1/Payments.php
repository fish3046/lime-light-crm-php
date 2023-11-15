<?php

namespace KevinEm\LimeLightCRM\v1;

/**
 * Class Payments
 * @package KevinEm/LimeLightCRM/v1
 */
class Payments extends AbstractService
{
    public function authorizePayment()
    {
        return $this->makeRequest('authorize_payment', []);
    }

    public function gatewayView(array $gatewayIds)
    {
        return $this->makeRequest('gateway_view', ['gateway_id' => $gatewayIds]);
    }

    public function getAlternativeProvider(array $data)
    {
        return $this->makeRequest('get_alternative_provider', $data);
    }

    public function paymentRouterView(int $paymentRouterId)
    {
        return $this->makeRequest('payment_router_view', ['payment_router_id' => $paymentRouterId]);
    }

    public function threeDRedirect(int $orderId)
    {
        return $this->makeRequest('three_d_redirect', ['order_id' => $orderId]);
    }
}
