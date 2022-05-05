<?php

namespace KevinEm\LimeLightCRM;

use KevinEm\LimeLightCRM\Traits\ArrayableTrait;

/**
 * DTO for data passed to our application from limelight in a post back
 *
 * @package KevinEm\LimeLightCRM
 */
class PostBackModel implements \JsonSerializable
{
    use ArrayableTrait;

    protected $affid;
    protected $affiliate;
    protected $afid;
    protected $aid;
    protected $ancestor_id;
    protected $authorization_id;
    protected $billing_address_2;
    protected $billing_address;
    protected $billing_city;
    protected $billing_country;
    protected $billing_state_desc;
    protected $billing_state_id;
    protected $billing_zip;
    protected $c1;
    protected $c2;
    protected $c3;
    protected $campaign_desc;
    protected $campaign_id;
    protected $campaign_name;
    protected $cb_service_outcome;
    protected $cb_service_source;
    protected $cb_service_type;
    protected $click_id;
    protected $currency_code;
    protected $customer_id;
    protected $decline_reason;
    protected $decline_salvage_discount;
    protected $digital_delivery_password;
    protected $digital_delivery_username;
    protected $email;
    protected $first_name;
    protected $gateway_id;
    protected $ip_address;
    protected $ischargeback;
    protected $is_fraud;
    protected $is_gift;
    protected $is_recurring;
    protected $is_shippable;
    protected $is_test_cc;
    protected $last_name;
    protected $non_taxable_amount;
    protected $opt;
    protected $order_date_time;
    protected $order_date;
    protected $order_id;
    protected $order_status;
    protected $order_total;
    protected $parent_order_id;
    protected $payment_method;
    protected $phone;
    protected $post_back_action;
    protected $product_id_csv;
    protected $product_names_csv;
    protected $product_prices_csv;
    protected $product_qtys_csv;
    protected $product_skus_csv;
    protected $rebill_depth;
    protected $rebill_discount;
    protected $recurring_date;
    protected $retry_attempt;
    protected $sales_tax_percent;
    protected $shipping_address_2;
    protected $shipping_address;
    protected $shipping_city;
    protected $shipping_country;
    protected $shipping_group_name;
    protected $shipping_id;
    protected $shipping_method;
    protected $shipping_state_desc;
    protected $shipping_state_id;
    protected $shipping_total;
    protected $shipping_zip;
    protected $sid;
    protected $subscription_active_csv;
    protected $subscription_id_csv;
    protected $sub_affiliate;
    protected $taxable_amount;
    protected $tax_factor;
    protected $total_no_shipping;
    protected $transaction_id;
    protected $void_refund_amount;
    protected $was_reprocessed;

    public function __construct(array $data = [])
    {
        $this->affid                     = $data['affid'] ?? null;
        $this->affiliate                 = $data['affiliate'] ?? null;
        $this->afid                      = $data['afid'] ?? null;
        $this->aid                       = $data['aid'] ?? null;
        $this->ancestor_id               = $data['ancestor_id'] ?? null;
        $this->authorization_id          = $data['authorization_id'] ?? null;
        $this->billing_address_2         = $data['billing_address_2'] ?? null;
        $this->billing_address           = $data['billing_address'] ?? null;
        $this->billing_city              = $data['billing_city'] ?? null;
        $this->billing_country           = $data['billing_country'] ?? null;
        $this->billing_state_desc        = $data['billing_state_desc'] ?? null;
        $this->billing_state_id          = $data['billing_state_id'] ?? null;
        $this->billing_zip               = $data['billing_zip'] ?? null;
        $this->c1                        = $data['c1'] ?? null;
        $this->c2                        = $data['c2'] ?? null;
        $this->c3                        = $data['c3'] ?? null;
        $this->campaign_desc             = $data['campaign_desc'] ?? null;
        $this->campaign_id               = $data['campaign_id'] ?? null;
        $this->campaign_name             = $data['campaign_name'] ?? null;
        $this->cb_service_outcome        = $data['cb_service_outcome'] ?? null;
        $this->cb_service_source         = $data['cb_service_source'] ?? null;
        $this->cb_service_type           = $data['cb_service_type'] ?? null;
        $this->click_id                  = $data['click_id'] ?? null;
        $this->currency_code             = $data['currency_code'] ?? null;
        $this->customer_id               = $data['customer_id'] ?? null;
        $this->decline_reason            = $data['decline_reason'] ?? null;
        $this->decline_salvage_discount  = $data['decline_salvage_discount'] ?? null;
        $this->digital_delivery_password = $data['digital_delivery_password'] ?? null;
        $this->digital_delivery_username = $data['digital_delivery_username'] ?? null;
        $this->email                     = $data['email'] ?? null;
        $this->first_name                = $data['first_name'] ?? null;
        $this->gateway_id                = $data['gateway_id'] ?? null;
        $this->ip_address                = $data['ip_address'] ?? null;
        $this->ischargeback              = $data['ischargeback'] ?? null;
        $this->is_fraud                  = $data['is_fraud'] ?? null;
        $this->is_gift                   = $data['is_gift'] ?? null;
        $this->is_recurring              = $data['is_recurring'] ?? null;
        $this->is_shippable              = $data['is_shippable'] ?? null;
        $this->is_test_cc                = $data['is_test_cc'] ?? null;
        $this->last_name                 = $data['last_name'] ?? null;
        $this->non_taxable_amount        = $data['non_taxable_amount'] ?? null;
        $this->opt                       = $data['opt'] ?? null;
        $this->order_date_time           = $data['order_date_time'] ?? null;
        $this->order_date                = $data['order_date'] ?? null;
        $this->order_id                  = $data['order_id'] ?? null;
        $this->order_status              = $data['order_status'] ?? null;
        $this->order_total               = $data['order_total'] ?? null;
        $this->parent_order_id           = $data['parent_order_id'] ?? null;
        $this->payment_method            = $data['payment_method'] ?? null;
        $this->phone                     = $data['phone'] ?? null;
        $this->post_back_action          = $data['post_back_action'] ?? null;
        $this->product_id_csv            = $data['product_id_csv'] ?? null;
        $this->product_names_csv         = $data['product_names_csv'] ?? null;
        $this->product_prices_csv        = $data['product_prices_csv'] ?? null;
        $this->product_qtys_csv          = $data['product_qtys_csv'] ?? null;
        $this->product_skus_csv          = $data['product_skus_csv'] ?? null;
        $this->rebill_depth              = $data['rebill_depth'] ?? null;
        $this->rebill_discount           = $data['rebill_discount'] ?? null;
        $this->recurring_date            = $data['recurring_date'] ?? null;
        $this->retry_attempt             = $data['retry_attempt'] ?? null;
        $this->sales_tax_percent         = $data['sales_tax_percent'] ?? null;
        $this->shipping_address_2        = $data['shipping_address_2'] ?? null;
        $this->shipping_address          = $data['shipping_address'] ?? null;
        $this->shipping_city             = $data['shipping_city'] ?? null;
        $this->shipping_country          = $data['shipping_country'] ?? null;
        $this->shipping_group_name       = $data['shipping_group_name'] ?? null;
        $this->shipping_id               = $data['shipping_id'] ?? null;
        $this->shipping_method           = $data['shipping_method'] ?? null;
        $this->shipping_state_desc       = $data['shipping_state_desc'] ?? null;
        $this->shipping_state_id         = $data['shipping_state_id'] ?? null;
        $this->shipping_total            = $data['shipping_total'] ?? null;
        $this->shipping_zip              = $data['shipping_zip'] ?? null;
        $this->sid                       = $data['sid'] ?? null;
        $this->subscription_active_csv   = $data['subscription_active_csv'] ?? null;
        $this->subscription_id_csv       = $data['subscription_id_csv'] ?? null;
        $this->sub_affiliate             = $data['sub_affiliate'] ?? null;
        $this->taxable_amount            = $data['taxable_amount'] ?? null;
        $this->tax_factor                = $data['tax_factor'] ?? null;
        $this->total_no_shipping         = $data['total_no_shipping'] ?? null;
        $this->transaction_id            = $data['transaction_id'] ?? null;
        $this->void_refund_amount        = $data['void_refund_amount'] ?? null;
        $this->was_reprocessed           = $data['was_reprocessed'] ?? null;
    }

    /**
     * @return mixed
     */
    public function getAffid()
    {
        return $this->affid;
    }

    /**
     * @return mixed
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }

    /**
     * @return mixed
     */
    public function getAfid()
    {
        return $this->afid;
    }

    /**
     * @return mixed
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * @return mixed
     */
    public function getAncestorId()
    {
        return $this->ancestor_id;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationId()
    {
        return $this->authorization_id;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress2()
    {
        return $this->billing_address_2;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->billing_city;
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->billing_country;
    }

    /**
     * @return mixed
     */
    public function getBillingStateDesc()
    {
        return $this->billing_state_desc;
    }

    /**
     * @return mixed
     */
    public function getBillingStateId()
    {
        return $this->billing_state_id;
    }

    /**
     * @return mixed
     */
    public function getBillingZip()
    {
        return $this->billing_zip;
    }

    /**
     * @return mixed
     */
    public function getC1()
    {
        return $this->c1;
    }

    /**
     * @return mixed
     */
    public function getC2()
    {
        return $this->c2;
    }

    /**
     * @return mixed
     */
    public function getC3()
    {
        return $this->c3;
    }

    /**
     * @return mixed
     */
    public function getCampaignDesc()
    {
        return $this->campaign_desc;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @return mixed
     */
    public function getCampaignName()
    {
        return $this->campaign_name;
    }

    /**
     * @return mixed
     */
    public function getCbServiceOutcome()
    {
        return $this->cb_service_outcome;
    }

    /**
     * @return mixed
     */
    public function getCbServiceSource()
    {
        return $this->cb_service_source;
    }

    /**
     * @return mixed
     */
    public function getCbServiceType()
    {
        return $this->cb_service_type;
    }

    /**
     * @return mixed
     */
    public function getClickId()
    {
        return $this->click_id;
    }

    /**
     * Currency code: USD, EUR, GBP, CAD, AUD, ZAR, JPY
     *
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * If order_status = 0, this value will be the decline reason from the payment gateway.
     *
     * @return mixed
     */
    public function getDeclineReason()
    {
        return $this->decline_reason;
    }

    /**
     * Discount applied as a result of subscription management decline salvage settings.
     *
     * @return mixed
     */
    public function getDeclineSalvageDiscount()
    {
        return $this->decline_salvage_discount;
    }

    /**
     * If using supported membership providers, the value of the password generated
     *
     * @return mixed
     */
    public function getDigitalDeliveryPassword()
    {
        return $this->digital_delivery_password;
    }

    /**
     * If using supported membership providers, the value of the username generated
     *
     * @return mixed
     */
    public function getDigitalDeliveryUsername()
    {
        return $this->digital_delivery_username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getGatewayId()
    {
        return $this->gateway_id;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @return mixed
     */
    public function getIschargeback()
    {
        return $this->ischargeback;
    }

    /**
     * This flag indicates whether this order was marked automatically as fraud by
     * a fraud provider mid-way in the transaction.
     *
     * @return mixed
     */
    public function getIsFraud()
    {
        return $this->is_fraud;
    }

    /**
     * 1 if it is a gift order, 0 if it is not a gift order
     *
     * @return mixed
     */
    public function getIsGift()
    {
        return $this->is_gift;
    }

    /**
     * @return mixed
     */
    public function getIsRecurring()
    {
        return $this->is_recurring;
    }

    /**
     * @return mixed
     */
    public function getIsShippable()
    {
        return $this->is_shippable;
    }

    /**
     * This flag indicates whether this is a test credit card or not
     *
     * @return mixed
     */
    public function getIsTestCc()
    {
        return $this->is_test_cc;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getNonTaxableAmount()
    {
        return $this->non_taxable_amount;
    }

    /**
     * @return mixed
     */
    public function getOpt()
    {
        return $this->opt;
    }

    /**
     * DateTime of Order mm/dd/yyyy hh:mm:ss. Where hours are in military time 00-24
     *
     * @return mixed
     */
    public function getOrderDateTime()
    {
        return $this->order_date_time;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * 1 For Approvals, 0 For Declines
     *
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * @return mixed
     */
    public function getOrderTotal()
    {
        return $this->order_total;
    }

    /**
     * @return mixed
     */
    public function getParentOrderId()
    {
        return $this->parent_order_id;
    }

    /**
     * Payment Method Of Order: VISA, DISCOVER, MASTERCARD, AMERICAN EXPRESS, OFFLINE, CHECK or UNKNOWN
     *
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getPostBackAction()
    {
        return $this->post_back_action;
    }

    /**
     * @return mixed
     */
    public function getProductIdCsv()
    {
        return $this->product_id_csv;
    }

    /**
     * @return mixed
     */
    public function getProductNamesCsv()
    {
        return $this->product_names_csv;
    }

    /**
     * @return mixed
     */
    public function getProductPricesCsv()
    {
        return $this->product_prices_csv;
    }

    /**
     * @return mixed
     */
    public function getProductQtysCsv()
    {
        return $this->product_qtys_csv;
    }

    /**
     * @return mixed
     */
    public function getProductSkusCsv()
    {
        return $this->product_skus_csv;
    }

    /**
     * @return mixed
     */
    public function getRebillDepth()
    {
        return $this->rebill_depth;
    }

    /**
     * @return mixed
     */
    public function getRebillDiscount()
    {
        return $this->rebill_discount;
    }

    /**
     * @return mixed
     */
    public function getRecurringDate()
    {
        return $this->recurring_date;
    }

    /**
     * @return mixed
     */
    public function getRetryAttempt()
    {
        return $this->retry_attempt;
    }

    /**
     * @return mixed
     */
    public function getSalesTaxPercent()
    {
        return $this->sales_tax_percent;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress2()
    {
        return $this->shipping_address_2;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * @return mixed
     */
    public function getShippingCity()
    {
        return $this->shipping_city;
    }

    /**
     * @return mixed
     */
    public function getShippingCountry()
    {
        return $this->shipping_country;
    }

    /**
     * @return mixed
     */
    public function getShippingGroupName()
    {
        return $this->shipping_group_name;
    }

    /**
     * @return mixed
     */
    public function getShippingId()
    {
        return $this->shipping_id;
    }

    /**
     * @return mixed
     */
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * @return mixed
     */
    public function getShippingStateDesc()
    {
        return $this->shipping_state_desc;
    }

    /**
     * @return mixed
     */
    public function getShippingStateId()
    {
        return $this->shipping_state_id;
    }

    /**
     * @return mixed
     */
    public function getShippingTotal()
    {
        return $this->shipping_total;
    }

    /**
     * @return mixed
     */
    public function getShippingZip()
    {
        return $this->shipping_zip;
    }

    /**
     * @return mixed
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionActiveCsv()
    {
        return $this->subscription_active_csv;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionIdCsv()
    {
        return $this->subscription_id_csv;
    }

    /**
     * @return mixed
     */
    public function getSubAffiliate()
    {
        return $this->sub_affiliate;
    }

    /**
     * @return mixed
     */
    public function getTaxableAmount()
    {
        return $this->taxable_amount;
    }

    /**
     * @return mixed
     */
    public function getTaxFactor()
    {
        return $this->tax_factor;
    }

    /**
     * @return mixed
     */
    public function getTotalNoShipping()
    {
        return $this->total_no_shipping;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * This is the CUMULATIVE amount of all refunds against the original charge, not the amount of just this
     * event.  If the original charge was for 20, there was one previous partial refund of 5, then a second
     * refund of 10, the second void_refund_amount will be 15.
     *
     * There is no field for the value of just this specific refund event.  After speaking with their customer
     * service team in 2021-06, adding that field would be "a very large task since we don't have it broken
     * down that way"
     *
     * @return mixed
     */
    public function getVoidRefundAmount()
    {
        return $this->void_refund_amount;
    }

    /**
     * This flag indicates that the order was salvaged from a decline. 0 Means no, 1 means
     * was reprocessed through decline salvage on orders, 2 means the recurring billing
     * salvaged after retry
     *
     * @return mixed
     */
    public function getWasReprocessed()
    {
        return $this->was_reprocessed;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
