<?php

/**
 * This file contains tests for the DnaServiceProvider, ensuring that service provider bindings work as expected.
 */

namespace Tests\Unit;

use Tests\TestCase;
use LaravelDna\Jobs\DispatchMatchkitsJob;
use Dna\MatchKits;
use Dna\Visualization;
use Dna\Triangulation;
use Illuminate\Support\Facades\App;

class DnaServiceProviderTest extends TestCase
{
    /**
     * Test that the DispatchMatchkitsJob is correctly bound in the service container.
     */
    public function testDispatchMatchkitsJobIsBoundCorrectly()
    {
        $resolvedInstance = App::make('dispatchMatchkits');
        $this->assertInstanceOf(DispatchMatchkitsJob::class, $resolvedInstance);
    }

    /**
     * Test that the MatchKits class is correctly bound as a singleton in the service container.
     */
    public function testMatchKitsIsBoundAsSingleton()
    {
        $instance1 = App::make(MatchKits::class);
        $instance2 = App::make(MatchKits::class);
        
        $this->assertInstanceOf(MatchKits::class, $instance1);
        $this->assertSame($instance1, $instance2, 'MatchKits should be bound as a singleton');
    }

    /**
     * Test that the DnaServiceProvider boots correctly without errors.
     */
    public function testServiceProviderBootsCorrectly()
    {
        // Verify that all bindings are registered correctly after boot
        // Orchestra Testbench handles bootstrapping, so we just verify the bindings exist
        $this->assertTrue($this->app->bound(MatchKits::class));
        $this->assertTrue($this->app->bound(Visualization::class));
        $this->assertTrue($this->app->bound(Triangulation::class));
        $this->assertTrue($this->app->bound('matchKits'));
        $this->assertTrue($this->app->bound('dispatchMatchkits'));
    }
}
