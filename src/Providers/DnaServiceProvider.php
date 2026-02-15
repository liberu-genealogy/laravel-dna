<?php

namespace LaravelDna\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelDna\Jobs\DispatchMatchkitsJob;
use Dna\MatchKits;
use Dna\Visualization;
use Dna\Triangulation;

class DnaServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register MatchKits as a singleton with its dependencies
        $this->app->singleton(MatchKits::class, function($app) {
            return new MatchKits(
                new Visualization(),
                new Triangulation()
            );
        });

        // Register facade accessor
        $this->app->singleton('matchKits', function($app) {
            return $app->make(MatchKits::class);
        });

        // Register job binding for backward compatibility
        $this->app->bind('dispatchMatchkits', function($app) {
            return new DispatchMatchkitsJob($app->make(MatchKits::class));
        });
    }

    public function boot()
    {
        // Optional: Add event listeners or other bootstrapping code necessary for the php-dna library integration
    }
}
