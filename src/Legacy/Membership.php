<?php


namespace KevinEm\LimeLightCRM\Legacy;


use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMMembershipException;

/**
 * Class Membership
 * @package KevinEm\LimeLightCRM\Legacy
 */
class Membership
{

    /**
     * @var LimeLightCRM
     */
    protected $limeLightCRM;

    /**
     * Membership constructor.
     * @param LimeLightCRM $limeLightCRM
     */
    public function __construct(LimeLightCRM $limeLightCRM)
    {
        $this->limeLightCRM = $limeLightCRM;
    }

    /**
     * @return string
     */
    public function getMembershipUrl()
    {
        return $this->limeLightCRM->getBaseUrl() . '/admin/membership.php';
    }

    /**
     * @param array $response
     * @throws LimeLightCRMMembershipException
     */
    public function checkResponse(array $response)
    {
        $exception = null;

        if (isset($response['response_code'])) {
            $responses = explode(',', $response['response_code']);

            foreach ($responses as $code) {
                if (!in_array($code, [100, 343])) {
                    $exception = new LimeLightCRMMembershipException($code, $exception, $response);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }
    }

    /**
     * @return array
     */
    public function findActiveCampaign()
    {
        $formParams = $this->limeLightCRM->buildFormParams('campaign_find_active');

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @return mixed
     */
    public function validateCredentials()
    {
        $formParams = $this->limeLightCRM->buildFormParams('validate_credentials');

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        return $res;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCampaign(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('campaign_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomerActiveProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_find_active_product', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function calculateRefund(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_calculate_refund', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOverdueOrders(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find_overdue', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function refundOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_refund', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function voidOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_void', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function forceOrderBill(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_force_bill', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateRecurringOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_update_recurring', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findUpdatedOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find_updated', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateSubscription(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('subscription_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_index', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProductAttribute(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_attribute_index', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function copyProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_copy', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function createProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_create', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function deleteProduct(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_delete', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function stopRecurringUpsell(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('upsell_stop_recurring', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewProspect(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProspect(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findProspect(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCustomer(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomer(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function reprocessOrder(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_reprocess', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAlternativeProvider(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('get_alternative_provider', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function repostToFulfillment(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('repost_to_fulfillment', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewShippingMethod(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('shipping_method_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findShippingMethod(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('shipping_method_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function validateCoupon(array $data)
    {
        $formParams = $this->limeLightCRM->buildFormParams('coupon_validate', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}