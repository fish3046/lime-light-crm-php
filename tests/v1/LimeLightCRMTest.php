<?php
namespace KevinEm\LimeLightCRM\Tests\v1;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMGenericException;
use KevinEm\LimeLightCRM\v1\LimeLightCRM;
use PHPUnit\Framework\TestCase;

class LimeLightCRMTest extends TestCase
{
    /**
     * @expectedException \KevinEm\LimeLightCRM\Exceptions\LimeLightCRMParseResponseException
     * @expectedExceptionMessage Cannot understand limelight response
     */
    public function testExceptionOnUnparseableResponse()
    {
        $rawExpectedResponse  = 'alkjsdfklasdjlkf';
        $mock = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        $s->makeRequest('', [], 'POST');
    }

    public function testResponseObjectReturns()
    {
        $rawExpectedResponse  = '{"response_code": "100","error_found": "0"}';
        $mock = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        $res = $s->makeRequest('', [], 'POST');

        $this->assertInstanceOf(\KevinEm\LimeLightCRM\v1\Response::class, $res);
        $this->assertEquals(100, $res['response_code']);
    }

    public function testExceptionOnErrorCode()
    {
        $rawExpectedResponse  = '{"response_code": "200","error_found": "Something went wrong"}';
        $mock = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        try {
            $s->makeRequest('', [], 'POST');

            $this->fail('Did not throw exception');
        } catch (LimeLightCRMGenericException $ex) {
            $jsonExpectedResponse = json_decode($rawExpectedResponse, true);

            $this->assertEquals($jsonExpectedResponse, $ex->getResponse());
        }
    }

    public function test343IsSuccess()
    {
        $rawExpectedResponse  = '{"response_code": "343","error_found": "Everything is fine"}';
        $mock = new MockHandler([
            new Response(200, [], $rawExpectedResponse),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $s = new LimeLightCRM($client, []);

        $resp = $s->makeRequest('', [], 'POST');

        $this->assertTrue($resp->isSuccess());
        $this->assertEquals(343, $resp['response_code']);
    }
}