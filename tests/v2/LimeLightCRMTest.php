<?php

namespace KevinEm\LimeLightCRM\Tests\v2;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException;
use KevinEm\LimeLightCRM\v2\LimeLightCRM;
use PHPUnit\Framework\TestCase;

class LimeLightCRMTest extends TestCase
{
    public function testRequestSuccess()
    {
        $rawExpectedResponse = '{"status": "SUCCESS"}';
        $mock                = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client  = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, ['base_url' => '', 'username' => '', 'password' => '']);

        $response = $s->makeRequest('', []);

        $jsonExpectedResponse = json_decode($rawExpectedResponse, true);

        $this->assertEquals($jsonExpectedResponse, $response);
    }

    public function testRequestErrorWithMessage()
    {
        $this->expectException(LimeLightCRMGenericException::class);
        $this->expectExceptionMessage('error message');
        $this->expectExceptionCode(400);

        $rawExpectedResponse = '{"status": "SUCCESS","message": "error message"}';
        $mock                = new MockHandler([
            new Response(400, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client  = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, ['base_url' => '', 'username' => '', 'password' => '']);

        $s->makeRequest('', []);
    }
}
