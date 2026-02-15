<?php

namespace Tests;

use LaravelDna\Providers\DnaServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DnaServiceProvider::class,
        ];
    }
}
