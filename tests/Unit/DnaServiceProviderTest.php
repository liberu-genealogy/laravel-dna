&lt;?php

/**
 * This file contains tests for the DnaServiceProvider, ensuring that service provider bindings work as expected.
 */

namespace Tests\Unit;

use Tests\TestCase;
use Src\Jobs\DispatchMatchkitsJob;
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
}
