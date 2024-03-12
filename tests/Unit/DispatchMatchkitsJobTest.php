&lt;?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Jobs\DispatchMatchkitsJob;
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

        DispatchMatchkitsJob::dispatch();

        Queue::assertPushed(DispatchMatchkitsJob::class);
    }
}
/**
 * Tests for DispatchMatchkitsJob class.
 * 
 * This file contains unit tests for the DispatchMatchkitsJob class, focusing on the job dispatching mechanism
 * within the Laravel application. It ensures that the job is pushed to the queue and processed as expected,
 * leveraging mock objects to simulate the behavior of external dependencies.
 */
/**
 * Clean up after each test case.
 * 
 * Ensures that Mockery is closed to prevent memory leaks and that the parent tearDown method is called
 * to perform any additional cleanup tasks.
 */
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
        Log::shouldReceive('error')->once();

        $mock = Mockery::mock(Matchkits::class);
        $mock->shouldReceive('process')->once()->andThrow(\Exception::class);
        $this->app->instance(Matchkits::class, $mock);

        DispatchMatchkitsJob::dispatch();
    }
use Illuminate\Support\Facades\Log;
