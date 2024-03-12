<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\DispatchMatchkitsJob;

class DnaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('dispatchMatchkits', function($app) {
            return new DispatchMatchkitsJob();
        });
    }

    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
