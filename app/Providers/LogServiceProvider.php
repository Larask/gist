<?php

namespace Cycle\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LogglyFormatter;
use Monolog\Handler\LogglyHandler;

/**
 * Class LogServiceProvider
 * @package Cycle\Providers
 */
class LogServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootLoggly();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function bootLoggly()
    {
        $logglyHandler = new LogglyHandler(config('services.loggly.token'));
        $logglyHandler->setFormatter(new LogglyFormatter);

        \Log::getMonolog()->pushHandler($logglyHandler);
    }

}
