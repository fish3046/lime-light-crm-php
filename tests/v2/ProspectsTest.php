<?php

namespace KevinEm\LimeLightCRM\Tests;

use KevinEm\LimeLightCRM\v2\LimeLightCRM;
use KevinEm\LimeLightCRM\v2\Prospects;
use PHPUnit\Framework\TestCase;

class ProspectsTest extends TestCase
{
    public function testAddCustomFieldValues()
    {
        $mockEngine = $this->getMockBuilder(LimeLightCRM::class)
            ->disableOriginalConstructor()
            ->getMock();

        $expectedUrl = '/api/v2/prospects/11/custom_fields';
        $expectedData = [
            'custom_fields' => [
                [
                    'id'    => 256,
                    'value' => 'manchester'
                ]
            ]
        ];

        $mockEngine->expects($this->once())
            ->method('makeRequest')
            ->with($expectedUrl, $expectedData);

        $s = new Prospects($mockEngine);

        $s->addCustomFieldValues(11, [256 => 'manchester']);
    }
}