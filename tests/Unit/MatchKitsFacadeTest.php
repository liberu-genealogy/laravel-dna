&lt;?php

/**
 * This class contains unit tests for the `MatchKitsFacade`, ensuring its correct functionality and reliability.
 */
namespace Tests\Unit;

use Tests\TestCase;
use App\Facades\MatchKitsFacade;
use LiburuGenealogy\PhpDna\Matchkits;
use Illuminate\Support\Facades\App;

class MatchKitsFacadeTest extends TestCase
{
    /**
     * Test to ensure the facade correctly resolves to a Matchkits instance.
     * Validates the service container binding for `matchKits`.
     */
    public function test_facade_resolves_to_matchkits_instance()
    {
        $matchKitsInstance = App::make('matchKits');
        $this->assertInstanceOf(Matchkits::class, $matchKitsInstance);
    }

    /**
     * Test to verify that the `process` method can be called via the facade.
     * Mocks the Matchkits class to ensure facade forwards the `process` call correctly.
     */
    public function test_process_method_is_callable_via_facade()
    {
        $matchKitsMock = \Mockery::mock(Matchkits::class);
        $matchKitsMock->shouldReceive('process')->once()->andReturnTrue();

        App::instance('matchKits', $matchKitsMock);

        $result = MatchKitsFacade::process();
        $this->assertTrue($result);
    }
}
