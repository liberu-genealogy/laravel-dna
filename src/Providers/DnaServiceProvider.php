<?php

/**
 * Service provider for DNA functionalities.
 * This provider binds the DispatchMatchkitsJob and integrates the php-dna library.
 */

namespace Src\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Jobs\DispatchMatchkitsJob;
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
    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
