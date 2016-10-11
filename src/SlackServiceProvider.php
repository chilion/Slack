<?php

namespace CJSDevelopment;

use Illuminate\Support\ServiceProvider;

/**
 * Class SlackServiceProvider
 * @package CJSDevelopment
 */
class SlackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/slack.php' => config_path('slack.php'),
        ], 'config');
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
}
