<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * register the service provider
     *
     * @return void
     */
    public function register()
    {
        //include the active package helpers
        if (count(config('helpers.package_helpers'))) {
            foreach (config('helpers.package_helpers', []) as $active_helper) {
                $file = app()->path() . '/Helpers/' . $active_helper . '_helper.php';
                if (file_exists($file)) {
                    require_once($file);
                }
            }
        }
    }

    /**
     * boot the service provider
     *
     * @return void
     */
    public function boot()
    {
        //publish configuration
        $this->publishes([
            __DIR__ . '/config/helpers.php' => app()->basePath() . '/config/helpers.php',
        ], 'config');
    }
}
