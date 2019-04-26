<?php
namespace KevinEm\LimeLightCRM\Tests\v1\DTO;

use KevinEm\LimeLightCRM\v1\DTO\AuthorizePayment;
use PHPUnit\Framework\TestCase;

class AuthorizePaymentTest extends TestCase
{
    public function testBoolAsNumber()
    {
        $o = new AuthorizePayment();
        $o->setCascadeEnabled(true);

        $arr = $o->toArray();

        $this->assertSame(1, $arr['cascade_enabled']);
    }

    public function testLeavesEmptyStrings()
    {
        $o = new AuthorizePayment();
        $o->setBillingState('');

        $arr = $o->toArray();

        $this->assertArrayHasKey('billingState', $arr);
    }
}