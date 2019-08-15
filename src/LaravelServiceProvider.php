<?php

namespace Crazyssl;

use Illuminate\Support\ServiceProvider;

/**
 * Laravel 下的服务提供者
 */
class LaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'trustocean');

        app()->singleton('trustocean', function () {
            return new Client(config('trustocean.username'), config('trustocean.password'), config('trustocean.origin'));
        });
    }
}
