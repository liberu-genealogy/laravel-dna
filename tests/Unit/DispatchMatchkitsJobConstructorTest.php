<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use LaravelDna\Jobs\DispatchMatchkitsJob;
use Dna\MatchKits;
use ReflectionClass;

class DispatchMatchkitsJobConstructorTest extends TestCase
{
    public function testConstructorAssignsMatchkitsCorrectly()
    {
        $mockMatchkits = Mockery::mock(MatchKits::class);
        $job = new DispatchMatchkitsJob($mockMatchkits);

        // Use reflection to access the protected property
        $reflection = new ReflectionClass($job);
        $property = $reflection->getProperty('matchkits');
        $property->setAccessible(true);
        
        $this->assertSame($mockMatchkits, $property->getValue($job));
    }

    public function testHandleCallsMatchKitsOnMatchkits()
    {
        $mockMatchkits = Mockery::mock(MatchKits::class);
        $mockMatchkits->shouldReceive('matchKits')->once();

        $job = new DispatchMatchkitsJob($mockMatchkits);
        $job->handle();

        Mockery::close();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
