<?php


namespace KevinEm\LimeLightCRM\v1;


use KevinEm\LimeLightCRM\v1\DTO\AuthorizePayment;

/**
 * Class Orders
 *
 * @package KevinEm/LimeLightCRM/v1
 */
class Orders extends AbstractService
{
    /**
     * This method utilizes the billing and card data fields used by new_order, as well
     * as some basic CRM identifiers for campaign and product, and sends an authorization
     * request to the gateway. No order is created. Upon successful authorization, the
     * transaction information will be returned, otherwise the decline reason is provided.
     * If no auth_amount is provided, it will default to a 1.00 authorization.
     *
     * @param array|AuthorizePayment $data
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException
     * @throws \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException
     */
    public function authorizePayment($data)
    {
        if ($data instanceof AuthorizePayment) {
            $data = $data->toArray();
        } elseif (!is_array($data)) {
            throw new \InvalidArgumentException("Must supply either an array or a DTO");
        }

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