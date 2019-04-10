<?php
namespace KevinEm\LimeLightCRM\Laravel;

use GuzzleHttp\Client;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use KevinEm\LimeLightCRM\v1\LimeLightCRM;

class LimeLightCRMServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/limelightcrm.php' => config_path('limelightcrm.php'),
        ]);
    }

    public function register()
    {
        $this->registerV1Engine();
    }

    private function registerV1Engine()
    {
        $this->app->bind(LimeLightCRM::class, function(Container $app){
            $client = new Client();

            $options = [
                'base_url' => $app['config']['limelightcrm.base_url'],
                'username' => $app['config']['limelightcrm.username'],
                'password' => $app['config']['limelightcrm.password'],
            ];

            $e = new LimeLightCRM($client, $options);

            return $e;
        });
    }

    private function registerV2Engine()
    {
        $this->app->bind(\KevinEm\LimeLightCRM\v2\LimeLightCRM::class, function(Container $app){
            $client = new Client();

            $options = [
                'base_url' => $app['config']['limelightcrm.base_url'],
                'username' => $app['config']['limelightcrm.username'],
                'password' => $app['config']['limelightcrm.password'],
            ];

            $e = new LimeLightCRM($client, $options);

            return $e;
        });
    }
}