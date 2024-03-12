&lt;?php

/**
 * This file contains tests for the DnaServiceProvider, ensuring that service provider bindings work as expected.
 */

namespace Tests\Unit;

use Tests\TestCase;
use App\Jobs\DispatchMatchkitsJob;
use Illuminate\Support\Facades\App;

class DnaServiceProviderTest extends TestCase
{
    public function testDispatchMatchkitsJobIsBoundCorrectly()
    {
        $resolvedInstance = App::make('dispatchMatchkits');
        $this->assertInstanceOf(DispatchMatchkitsJob::class, $resolvedInstance);
    }
}
