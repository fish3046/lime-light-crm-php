<?php


namespace KevinEm\LimeLightCRM\v1;


/**
 * Class Orders
 * @package KevinEm/LimeLightCRM/v1
 */
class Orders extends AbstractService
{
    /**
     * @param array $data
     * @return array
     */
    public function authorizePayment(array $data)
    {
        return $this->makeRequest('authorize_payment', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function couponValidate(array $data)
    {
        return $this->makeRequest('coupon_validate', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrder(array $data)
    {
        return $this->makeRequest('new_order', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderCardOnFile(array $data)
    {
        return $this->makeRequest('new_order_card_on_file', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function newOrderWithProspect(array $data)
    {
        return $this->makeRequest('new_order_with_prospect', $data);
    }

    /**
     * @param $orderId
     * @return array
     */
    public function orderCalculateRefund($orderId)
    {
        return $this->makeRequest('order_calculate_refund', ['order_id' => $orderId]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderForceBill(array $data)
    {
        return $this->makeRequest('order_force_bill', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderFind(array $data)
    {
        return $this->makeRequest('order_find', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderFindOverdue(array $data)
    {
        return $this->makeRequest('order_find_overdue', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderFindUpdated(array $data)
    {
        return $this->makeRequest('order_find_updated', $data);
    }

    /**
     * @param array $orderIds
     * @return array
     */
    public function orderView(array $orderIds)
    {
        return $this->makeRequest('order_view', ['order_id' => $orderIds]);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderUpdate(array $data)
    {
        return $this->makeRequest('order_update', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderProductRefund(array $data)
    {
        return $this->makeRequest('order_product_refund', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function orderProductReturn(array $data)
    {
        return $this->makeRequest('order_product_return', $data);
    }

    /**
     * @param int  $orderId
     * @param      $amount
     * @param bool $keepRecurring
     * @return array
     */
    public function orderRefund(int $orderId, $amount, bool $keepRecurring = true)
    {
        return $this->makeRequest('order_refund', [
            'order_id'       => $orderId,
            'amount'         => $amount,
            'keep_recurring' => $keepRecurring ? 1 : 0,
        ]);
    }

    /**
     * @param int $orderId
     * @return array
     */
    public function orderReprocess(int $orderId)
    {
        return $this->makeRequest('order_reprocess', [
            'order_id' => $orderId
        ]);
    }

    /**
     * @param int $orderId
     * @return array
     */
    public function orderVoid(int $orderId)
    {
        return $this->makeRequest('order_void', [
            'order_id' => $orderId
        ]);
    }

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
    public function skipNextBilling(array $data)
    {
        return $this->makeRequest('skip_next_billing', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function subscriptionOrderUpdate(array $data)
    {
        return $this->makeRequest('subscription_order_update', $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function threeDRedirect(array $data)
    {
        return $this->makeRequest('three_d_redirect', $data);
    }

}