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
                'email'      => 'bob@jones.com',
                'ipAddress'  => '1.2.3.5',
                'guid'       => 'abc123'
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
                'shippingId'       => 2,
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
            ]);

        echo json_encode($resp);
        var_dump($resp);
    }
}