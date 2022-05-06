<?php

namespace KevinEm\LimeLightCRM\Services;

use KevinEm\LimeLightCRM\v1\LimeLightCRM;
use KevinEm\LimeLightCRM\v1\Response;

/**
 * Helper functions for managing product subscriptions
 *
 * @package KevinEm\LimeLightCRM\Services
 */
class SubscriptionService
{
    protected LimeLightCRM $v1Engine;

    public function __construct(LimeLightCRM $v1Engine)
    {
        $this->v1Engine = $v1Engine;
    }

    /**
     * Will stop an order/product subscription.  This is permanent until restartSubscription() is passed.
     *
     * @see https://developer-prod.sticky.io/#40e36799-fc92-45d6-bffc-5a9aba944f37
     * @param int $orderId
     * @param int $productId
     * @return Response
     */
    public function holdSubscription(int $orderId, int $productId): Response
    {
        return $this->v1Engine
            ->orders()
            ->subscriptionOrderUpdate([
                'order_id'   => $orderId,
                'product_id' => $productId,
                'status'     => 'stop',
            ]);
    }

    /**
     * Resume an order/product subscription that was placed on hold by holdSubscription()
     *
     * @see https://developer-prod.sticky.io/#40e36799-fc92-45d6-bffc-5a9aba944f37
     * @param int  $orderId
     * @param int  $productId
     * @param bool $preserveOriginalRebillDate Only works if product_id is not considered an upsell.
     *                                         Otherwise will act like false was passed
     * @return Response
     */
    public function restartSubscription(int $orderId, int $productId, bool $preserveOriginalRebillDate = true): Response
    {
        $status = $preserveOriginalRebillDate ? 'reset' : 'start';

        return $this->v1Engine
            ->orders()
            ->subscriptionOrderUpdate([
                'order_id'   => $orderId,
                'product_id' => $productId,
                'status'     => $status,
            ]);
    }

    /**
     * Changes next order price in the subscription to be the supplied value for one iteration.  If $makePermanent
     * is true, this will be permanent for all future bills on this subscription.
     *
     * @see https://developer-prod.sticky.io/#40e36799-fc92-45d6-bffc-5a9aba944f37
     * @param int    $orderId
     * @param int    $productId
     * @param string $price
     * @param bool   $makePermanent
     * @return Response
     */
    public function changeSubscriptionPrice(int $orderId, int $productId, string $price, bool $makePermanent = true): Response
    {
        return $this->v1Engine
            ->orders()
            ->subscriptionOrderUpdate([
                'order_id'                     => $orderId,
                'product_id'                   => $productId,
                'new_recurring_price'          => $price,
                'new_recurring_product_id'     => $productId,
                'preserve_new_recurring_price' => $makePermanent ? 1 : 0,
            ]);
    }

    /**
     * @see https://developer-prod.sticky.io/#40e36799-fc92-45d6-bffc-5a9aba944f37
     * @param int    $orderId
     * @param int    $productId
     * @param string $date MM/DD/YYYY format
     * @return Response
     */
    public function changeRecurringDate(int $orderId, int $productId, string $date): Response
    {
        return $this->v1Engine
            ->orders()
            ->subscriptionOrderUpdate([
                'order_id'           => $orderId,
                'product_id'         => $productId,
                'new_recurring_date' => $date,
            ]);
    }
}
