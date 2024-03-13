&lt;?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use Src\Jobs\DispatchMatchkitsJob;
use LiburuGenealogy\PhpDna\Matchkits;

class DispatchMatchkitsJobConstructorTest extends TestCase
{
    public function testConstructorAssignsMatchkitsCorrectly()
    {
        $mockMatchkits = Mockery::mock(Matchkits::class);
        $job = new DispatchMatchkitsJob($mockMatchkits);

        $this->assertAttributeEquals($mockMatchkits, 'matchkits', $job);
    }

    public function testHandleCallsProcessOnMatchkits()
    {
        $mockMatchkits = Mockery::mock(Matchkits::class);
        $mockMatchkits->shouldReceive('process')->once();

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
