<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Orders
 * @package KevinEm/LimeLightCRM/v1
 */
class Orders extends AbstractService
{
    public function authorizePayment(array $data)
    {
        return $this->makeRequest('authorize_payment', $data);
    }

    public function couponValidate(array $data)
    {
        return $this->makeRequest('coupon_validate', $data);
    }

    public function newOrder(array $data)
    {
        return $this->makeRequest('new_order', $data);
    }

    public function newOrderCardOnFile(array $data)
    {
        return $this->makeRequest('new_order_card_on_file', $data);
    }

    public function newOrderWithProspect(array $data)
    {
        return $this->makeRequest('new_order_with_prospect', $data);
    }

    public function orderCalculateRefund(int $orderId)
    {
        return $this->makeRequest('order_calculate_refund', ['order_id' => $orderId]);
    }

    public function orderForceBill(array $data)
    {
        return $this->makeRequest('order_force_bill', $data);
    }

    public function orderFind(array $data)
    {
        return $this->makeRequest('order_find', $data);
    }

    public function orderFindOverdue(array $data)
    {
        return $this->makeRequest('order_find_overdue', $data);
    }

    public function orderFindUpdated(array $data)
    {
        return $this->makeRequest('order_find_updated', $data);
    }

    public function orderView(array $orderIds)
    {
        return $this->makeRequest('order_view', ['order_id' => $orderIds]);
    }

    public function orderUpdate(array $data)
    {
        return $this->makeRequest('order_update', $data);
    }

    public function orderProductRefund(array $data)
    {
        return $this->makeRequest('order_product_refund', $data);
    }

    public function orderProductReturn(array $data)
    {
        return $this->makeRequest('order_product_return', $data);
    }

    /**
     * @param int  $orderId
     * @param      $amount
     * @param bool $keepRecurring   If false, all products attached to the order ID will cancel recurring subscriptions
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException
     */
    public function orderRefund(int $orderId, $amount, bool $keepRecurring = true)
    {
        return $this->makeRequest('order_refund', [
            'order_id'       => $orderId,
            'amount'         => $amount,
            'keep_recurring' => $keepRecurring ? 1 : 0,
        ]);
    }

    public function orderReprocess(int $orderId)
    {
        return $this->makeRequest('order_reprocess', [
            'order_id' => $orderId
        ]);
    }

    public function orderVoid(int $orderId)
    {
        return $this->makeRequest('order_void', [
            'order_id' => $orderId
        ]);
    }

    public function repostToFulfillment($orderId)
    {
        return $this->makeRequest('repost_to_fulfillment', ['order_id' => $orderId]);
    }

    public function skipNextBilling(array $data)
    {
        return $this->makeRequest('skip_next_billing', $data);
    }

    public function subscriptionOrderUpdate(array $data)
    {
        return $this->makeRequest('subscription_order_update', $data);
    }

    public function threeDRedirect(array $data)
    {
        return $this->makeRequest('three_d_redirect', $data);
    }

}