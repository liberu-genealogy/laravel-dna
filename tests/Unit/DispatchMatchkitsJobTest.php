<?php

/**
 * This file contains tests for the DispatchMatchkitsJob class, ensuring that the job dispatching process works as expected.
 */

namespace Tests\Unit;

use Tests\TestCase;
use LaravelDna\Jobs\DispatchMatchkitsJob;
use Dna\MatchKits;
use Mockery;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Log;
use Exception;

class DispatchMatchkitsJobTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Test that the matchKits method is called successfully when the DispatchMatchkitsJob is dispatched.
     */
    public function testMatchKitsIsCalledSuccessfully()
    {
        Queue::fake();

        $mock = Mockery::mock(MatchKits::class);
        $mock->shouldReceive('matchKits')->once()->andReturnNull();
        $this->app->instance(MatchKits::class, $mock);

        Queue::assertNothingPushed();

        DispatchMatchkitsJob::dispatch($mock);

        Queue::assertPushed(DispatchMatchkitsJob::class, function ($job) use ($mock) {
            return $job->matchkits === $mock;
        });

        Queue::assertPushedOn('default', DispatchMatchkitsJob::class);
    }

    /**
     * Test that the processMatchkits method handles exceptions properly.
     */
    public function testProcessMatchkitsHandlesExceptionsProperly()
    {
        Log::shouldReceive('error')->once()->withArgs(function($message) {
            return str_contains($message, 'Failed to process matchkits');
        });

        $mock = Mockery::mock(MatchKits::class);
        $mock->shouldReceive('matchKits')->once()->andThrow(new Exception('Test exception'));
        
        $job = new DispatchMatchkitsJob($mock);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Test exception');
        $job->handle();
    }
}
