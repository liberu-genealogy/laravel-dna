<?php

declare(strict_types=1);

namespace Src\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Jobs\DispatchMatchkitsJob;
use LiburuGenealogy\PhpDna\Matchkits;

final class DnaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('matchKits', fn() => new Matchkits());
        $this->app->bind('dispatchMatchkits', fn() => new DispatchMatchkitsJob($this->app->make(Matchkits::class)));
    }

    public function boot(): void
    {
        // Boot logic will be implemented here
    }
}