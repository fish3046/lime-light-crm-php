<?php
namespace KevinEm\LimeLightCRM\Tests\v1;

use GuzzleHttp\Client;
use KevinEm\LimeLightCRM\v1\LimeLightCRM;
use PHPUnit\Framework\TestCase;

/**
 * Use to test against your dry run gateway or otherwise.  This class is excluded from
 * the PHP unit test suite.  Configure credentials using tests/.env
 *
 * @package KevinEm\LimeLightCRM\Tests\v1
 */
class LiveTest extends TestCase
{
    /**
     * @var LimeLightCRM
     */
    protected $service;

    protected function setUp()
    {
        parent::setUp();

        $auth = [
            'base_url' => getenv('BASE_URL'),
            'username' => getenv('USER'),
            'password' => getenv('PASSWORD'),
        ];

        $c             = new Client();
        $this->service = new LimeLightCRM($c, $auth);
    }

    public function testNewProspect()
    {
        $resp = $this->service
            ->prospects()
            ->newProspect([
                'campaignId' => 1,
                'email'      => 'joyce@jones.com',
                'ipAddress'  => '1.2.3.5',
                'guid'       => 'abc123'
            ]);
        
        echo json_encode($resp);
        var_dump($resp);
    }

    public function testUpdateProspect()
    {
        $resp = $this->service
            ->prospects()
            ->prospectUpdate([
                'prospect_id' => [
                    '3' => [
                        'custom_fields' => ['id'=>1,'value'=>'again']
                    ]
                ]
            ]);

        echo json_encode($resp);
        var_dump($resp);
    }

    public function testNewOrderWithProspect()
    {
        $resp = $this->service
            ->orders()
            ->newOrderWithProspect([
                'prospectId'       => 1,
                'creditCardNumber' => '1444444444444440',
                'expirationDate'   => '0628',
                'CVV'              => '123',
                'creditCardType'   => 'VISA',     // Will say "Invalid payment type" if this is missing
                'tranType'         => 'Sale',
                'shippingId'       => 2,          // Shipping info is currently required by their API.  they plan on fixing that "soon"
                'shippingAddress1' => '123',
                'shippingCity'     => '123',
                'shippingState'    => '123',
                'shippingZip'      => '123',
                'offers'           => [
                    [
                        'offer_id'         => 1,
                        'product_id'       => 1,
                        'billing_model_id' => 3,
                    ]
                ],
                'shippingCountry'  => 'GB',
                'firstName'        => 'jimbo',     // Required
                'lastName'         => 'jones',      // Required
                'phone'            => 'jones',// Required
                'temp_customer_id'            => 'da66a4d1690505dc4da311bb0cc5dd56',
            ]);

        echo json_encode($resp);
        var_dump($resp);
    }

    public function testNewOrder()
    {
        $resp = $this->service
            ->orders()
            ->newOrder([
                'creditCardNumber' => '1444444444444440',
                'expirationDate'   => '0628',
                'CVV'              => '123',
                'creditCardType'   => 'VISA',     // Will say "Invalid payment type" if this is missing
                'tranType'         => 'Sale',
                'shippingId'       => 2,          // Shipping info is currently required by their API.  they plan on fixing that "soon"
                'shippingAddress1' => '123',
                'shippingCity'     => '123',
                'shippingState'    => '123',
                'shippingZip'      => '123',
                'offers'           => [
                    [
                        'offer_id'         => 1,
                        'product_id'       => 1,
                        'billing_model_id' => 3,
                    ]
                ],
                'shippingCountry'  => 'GB',
                'temp_customer_id' => 'da66a4d1690505dc4da311bb0cc5dd56',
            ]);

        echo json_encode($resp);
        var_dump($resp);
    }

    public function testOrderRefund()
    {
        $resp = $this->service
            ->orders()
            ->orderRefund(10001, 5.4);

        echo json_encode($resp);
        var_dump($resp);
    }

    public function testOrderPaymentAuth()
    {
        $resp = $this->service
            ->orders()
            ->authorizePayment([
                'billingAddress1'  => '123 main',
                'billingCity'      => 'tujunga',
                'billingState'     => 'CA',
                'billingZip'       => '12345',
                'billingCountry'   => 'GB',
                'phone'            => '01115468745',
                'email'            => 'jory@jones.com',
                'creditCardType'   => 'visa',
                'creditCardNumber' => '4111111111111111',
                'expirationDate'   => '0428',
                'CVV'              => '654',
                'ipAddress'        => '1.2.3.4',
                'productId'        => 1,
                'campaignId'       => 1,
                'auth_amount'      => '1',
                'save_customer'    => '1',
            ]);

        echo json_encode($resp);
        var_dump($resp);
    }
}