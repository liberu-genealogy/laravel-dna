&lt;?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Jobs\DispatchMatchkitsJob;
use LiburuGenealogy\PhpDna\Matchkits;
use Mockery;
use Illuminate\Support\Facades\Queue;

class DispatchMatchkitsJobTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Test that the process method is called successfully when the DispatchMatchkitsJob is dispatched.
     */
    public function testProcessIsCalledSuccessfully()
    {
        Queue::fake();

        $mock = Mockery::mock(Matchkits::class);
        $mock->shouldReceive('process')->once()->andReturnNull();
        $this->app->instance(Matchkits::class, $mock);

        Queue::assertNothingPushed();

        DispatchMatchkitsJob::dispatch($mock);

        Queue::assertPushed(DispatchMatchkitsJob::class, function ($job) use ($mock) {
            return $job->matchkits === $mock;
        });

        Queue::assertPushedOn('default', DispatchMatchkitsJob::class);
        Queue::after(function () use ($mock) {
            $mock->shouldHaveReceived('process')->once();
        });
    }
}
/**
 * This file contains tests for the DispatchMatchkitsJob class, ensuring that the job dispatching process works as expected.
 */
    /**
     * Test that the processMatchkits method handles exceptions properly.
     */
    public function testProcessMatchkitsHandlesExceptionsProperly()
    {
        Queue::fake();
        Log::shouldReceive('error')->once()->withArgs(function($message) {
            return str_contains($message, 'Failed to process matchkits');
        });

        $mock = Mockery::mock(Matchkits::class);
        $mock->shouldReceive('process')->once()->andThrow(\Exception::class);
        $this->app->instance(Matchkits::class, $mock);

        DispatchMatchkitsJob::dispatch($mock);
    }
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log;
use Exception;
