<?php
namespace KevinEm\LimeLightCRM\Tests\v2;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KevinEm\LimeLightCRM\v2\LimeLightCRM;
use PHPUnit\Framework\TestCase;

class LimeLightCRMTest extends TestCase
{
    public function testRequestSuccess()
    {
        $rawExpectedResponse  = '{"status": "SUCCESS"}';
        $mock = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        $response = $s->makeRequest('', []);

        $jsonExpectedResponse = json_decode($rawExpectedResponse, true);

        $this->assertEquals($jsonExpectedResponse, $response);
    }

    /**
     * @expectedException \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException
     * @expectedExceptionMessage error message
     * @expectedExceptionCode 400
     */
    public function testRequestErrorWithMessage()
    {
        $rawExpectedResponse  = '{"status": "SUCCESS","message": "error message"}';
        $mock = new MockHandler([
            new Response(400, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        $s->makeRequest('', []);
    }
}