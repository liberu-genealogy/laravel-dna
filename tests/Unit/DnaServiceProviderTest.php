&lt;?php

/**
 * Unit tests for DnaServiceProvider.
 * Ensures that service provider bindings work as expected within the Laravel application.
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
    }
}
