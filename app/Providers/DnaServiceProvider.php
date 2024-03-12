<?php

/**
 * Service Provider for DNA-related functionalities.
 * 
 * Registers and bootstraps DNA services, including the DispatchMatchkitsJob, to integrate with the php-dna library.
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\DispatchMatchkitsJob;
use LiburuGenealogy\PhpDna\Matchkits;

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
        * This method is called after all other service providers have been registered, meaning you have access to all other services that have been registered by the framework.
        */
        public function boot()
        {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
