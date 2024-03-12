<?php

/**
 * This service provider registers DNA-related services and bindings within the Laravel application,
 * facilitating dependency injection and service management. It is responsible for setting up the
 * DNA services, including the DispatchMatchkitsJob, ensuring they are available throughout the application.
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
    }

    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
     *
     * @return void
     */
    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
