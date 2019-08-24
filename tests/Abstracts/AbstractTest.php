<?php

namespace Crazyssl\Tests\Abstracts;

use Crazyssl\LaravelServiceProvider;
use Illuminate\Contracts\Console\Kernel;
use XiaohuiLam\Laravel\Test\TestCase;

/**
 * @method \Illuminate\Foundation\Testing\TestCase|\Illuminate\Http\Response|\Illuminate\Foundation\Testing\TestResponse post()
 */
abstract class AbstractTest extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        /**
         * @var \Illuminate\Foundation\Application $app
         */
        $app = require __DIR__ . '/../../vendor/laravel/laravel/bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        config()->set('app.env', 'testing');
        config()->set('app.debug', true);
        config()->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');
        $app->register(LaravelServiceProvider::class);

        return $app;
    }
}
