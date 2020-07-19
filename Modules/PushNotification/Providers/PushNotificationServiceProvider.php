<?php

namespace Modules\PushNotification\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\PushNotification\Adapter\AuroraAdapter;
use Modules\PushNotification\Adapter\AWSAdapter;
use Modules\PushNotification\Adapter\UmengAdapter;
use Modules\PushNotification\Adapter\XiaoMiAdapter;
use Modules\PushNotification\Bridge\TopicBridge;
use Modules\PushNotification\Contract\IPushAble;
use Modules\PushNotification\Service\TopicService;

class PushNotificationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config' => config_path('PushNotification'),
        ], 'config');
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
        $this->app->singleton(TopicService::class, function () {
            return new TopicService(new TopicBridge());
        });
        $this->app->bind(AWSAdapter::class, function ($app, $configs) {
            /** @var IPushAble $config */
            $config = $configs[0];

            return new AWSAdapter($config->getDeployInfo()['topic'] ?? '');
        });
        $this->app->bind(AuroraAdapter::class, function ($app, $configs) {
            /** @var IPushAble $config */
            $config = $configs[0];

            return new AuroraAdapter(
                $config->getDeployInfo()['app_key'] ?? null,
                $config->getDeployInfo()['secret'] ?? null
            );
        });
        $this->app->bind(XiaoMiAdapter::class, function ($app, $configs) {
            /** @var IPushAble $config */
            $config = $configs[0];

            return new XiaoMiAdapter(
                $config->getDeployInfo()['app_secret'] ?? null,
                $config->getDeployInfo()['package_name'] ?? null,
                $config->getTheme()
            );
        });
        $this->app->bind(UmengAdapter::class, function ($app, $configs) {
            /** @var IPushAble $config */
            $config = $configs[0];

            return new UmengAdapter($config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
