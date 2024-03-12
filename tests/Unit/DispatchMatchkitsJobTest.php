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
 * This file contains tests for the DispatchMatchkitsJob class, ensuring that the job dispatching process works as expected.
 */
    /**
     * Clean up after the test.
     */
    /**
     * Test if the process method is called successfully.
     *
     * @return void
     */
