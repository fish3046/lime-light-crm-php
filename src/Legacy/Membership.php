<?php

namespace KevinEm\LimeLightCRM\Legacy;

use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMMembershipException;

/**
 * Class Membership
 *
 * @package KevinEm\LimeLightCRM\Legacy
 */
class Membership
{
    public function __construct(protected LimeLightCRM $limeLightCRM)
    {
    }

    public function getMembershipUrl(): string
    {
        return $this->limeLightCRM->getBaseUrl() . '/admin/membership.php';
    }

    /**
     * @param array $response
     * @throws LimeLightCRMMembershipException
     */
    public function checkResponse(array $response): void
    {
        $exception = null;

        if (isset($response['response_code'])) {
            $responses = explode(',', $response['response_code']);

            foreach ($responses as $code) {
                if (!in_array($code, [100, 343])) {
                    $exception = new LimeLightCRMMembershipException((int)$code, $exception, $response);
                }
            }
        }

        if (isset($exception)) {
            throw $exception;
        }
    }

    public function findActiveCampaign(): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('campaign_find_active');

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function validateCredentials(): string
    {
        $formParams = $this->limeLightCRM->buildFormParams('validate_credentials');

        return $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);
    }

    public function viewCampaign(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('campaign_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findCustomerActiveProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_find_active_product', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function calculateRefund(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_calculate_refund', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findOverdueOrders(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find_overdue', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function refundOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_refund', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function voidOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_void', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function forceOrderBill(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_force_bill', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function updateRecurringOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_update_recurring', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findUpdatedOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_find_updated', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function updateOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function updateSubscription(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('subscription_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function viewOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function indexProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_index', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function indexProductAttribute(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_attribute_index', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function copyProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_copy', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function updateProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function createProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_create', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function deleteProduct(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('product_delete', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function stopRecurringUpsell(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('upsell_stop_recurring', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function viewProspect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function updateProspect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_update', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findProspect(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('prospect_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function viewCustomer(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findCustomer(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('customer_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function reprocessOrder(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('order_reprocess', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function getAlternativeProvider(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('get_alternative_provider', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function repostToFulfillment(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('repost_to_fulfillment', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function viewShippingMethod(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('shipping_method_view', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function findShippingMethod(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('shipping_method_find', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    public function validateCoupon(array $data): array
    {
        $formParams = $this->limeLightCRM->buildFormParams('coupon_validate', $data);

        $res = $this->limeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}
