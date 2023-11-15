<?php

namespace KevinEm\LimeLightCRM\Laravel;

use Closure;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleRetry\GuzzleRetryMiddleware;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use KevinEm\LimeLightCRM\v1\LimeLightCRM;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

class LimeLightCRMServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/limelightcrm.php' => config_path('limelightcrm.php'),
        ]);
    }

    public function register(): void
    {
        $this->registerV1Engine();
        $this->registerV2Engine();
    }

    private function registerV1Engine(): void
    {
        $this->app->bind(LimeLightCRM::class, function (Container $app) {
            $stack = HandlerStack::create();

            if ($retryMiddleware = $this->buildRetryMiddleware()) {
                $stack->push($retryMiddleware, 'retry');
            }

            $client = new Client([
                'handler' => $stack,
            ]);

            $options = [
                'base_url' => $app['config']['limelightcrm.base_url'],
                'username' => $app['config']['limelightcrm.username'],
                'password' => $app['config']['limelightcrm.password'],
            ];

            return new LimeLightCRM($client, $options);
        });
    }

    private function registerV2Engine(): void
    {
        $this->app->bind(\KevinEm\LimeLightCRM\v2\LimeLightCRM::class, function (Container $app) {
            $stack = HandlerStack::create();

            if ($retryMiddleware = $this->buildRetryMiddleware()) {
                $stack->push($retryMiddleware, 'retry');
            }

            $client = new Client([
                'handler' => $stack,
            ]);

            $options = [
                'base_url' => $app['config']['limelightcrm.base_url'],
                'username' => $app['config']['limelightcrm.username'],
                'password' => $app['config']['limelightcrm.password'],
            ];

            return new LimeLightCRM($client, $options);
        });
    }

    protected function buildRetryMiddleware(): ?Closure
    {
        $config          = $this->app['config']['limelightcrm'];
        $retryMiddleware = null;

        if (Arr::get($config, 'retry.lib-config.retry_enabled')) {
            // If the required library isn't installed, let's be loud about it.
            if (!class_exists('\GuzzleRetry\GuzzleRetryMiddleware')) {
                throw new Exception('Retry configured but required library missing');
            }

            // Setup optional logging.  Only do this if they haven't overridden the retry callback.
            if (Arr::get($config, 'retry.log-retries') && !Arr::get($config, 'retry.lib-config.on_retry_callback')) {
                Arr::set($config, 'retry.lib-config.on_retry_callback', $this->buildRetryLogger());
            }

            $retryMiddleware = GuzzleRetryMiddleware::factory(Arr::get($config, 'retry.lib-config'));
        }

        return $retryMiddleware;
    }

    /**
     * Builds a callback for use with GuzzleRetryMiddleware's on_retry_callback feature.
     *
     * @return callable
     * @throws BindingResolutionException
     */
    protected function buildRetryLogger(): callable
    {
        /** @var LoggerInterface $logger */
        $logger = $this->app->make(LoggerInterface::class);

        return function (int $retryCount, int|float $delayTimeout, RequestInterface $request) use ($logger) {
            $logger->debug('Retrying Sticky.io call', [
                'retry-count' => $retryCount,
                'uri'         => (string)$request->getUri(),
            ]);
        };
    }

    public function provides(): array
    {
        return [
            LimeLightCRM::class,
            \KevinEm\LimeLightCRM\v2\LimeLightCRM::class,
        ];
    }
}
