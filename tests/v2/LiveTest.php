<?php
namespace KevinEm\LimeLightCRM\Tests\v2;

use GuzzleHttp\Client;
use KevinEm\LimeLightCRM\v2\LimeLightCRM;
use PHPUnit\Framework\TestCase;

/**
 * Use to test against your dry run gateway or otherwise.  This class is excluded from
 * the PHP unit test suite.  Configure credentials using tests/.env
 *
 * @package KevinEm\LimeLightCRM\Tests\v2
 */
class LiveTest extends TestCase
{
    /**
     * @var LimeLightCRM
     */
    protected $service;

    protected function setUp(): void
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

    public function testGetProspectCustomFields()
    {
        $resp = $this->service
            ->prospects()
            ->getProspectCustomFields();
        
        echo json_encode($resp);
        var_dump($resp);
    }

    public function testAddCustomFieldValue()
    {
        $resp = $this->service
            ->prospects()
            ->addCustomFieldValues(3, ['guid' => 'abc123']);

        echo json_encode($resp);
        var_dump($resp);
    }
}
