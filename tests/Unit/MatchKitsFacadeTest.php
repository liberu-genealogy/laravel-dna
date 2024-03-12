&lt;?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Facades\MatchKitsFacade;
use LiburuGenealogy\PhpDna\Matchkits;
use Illuminate\Support\Facades\App;

class MatchKitsFacadeTest extends TestCase
{
    public function test_facade_resolves_to_matchkits_instance()
    {
        $matchKitsInstance = App::make('matchKits');
        $this->assertInstanceOf(Matchkits::class, $matchKitsInstance);
    }

    public function test_process_method_is_callable_via_facade()
    {
        $matchKitsMock = \Mockery::mock(Matchkits::class);
        $matchKitsMock->shouldReceive('process')->once()->andReturnTrue();

        App::instance('matchKits', $matchKitsMock);

        $result = MatchKitsFacade::process();
        $this->assertTrue($result);
    }
}
/**
 * Unit tests for the MatchKitsFacade.
 * Ensures that the facade correctly resolves to the Matchkits instance and that its methods are callable.
 */
/**
 * Tests that the MatchKitsFacade resolves to the correct Matchkits instance.
 * Asserts that the resolved instance is an instance of Matchkits class.
 * @return void
 */
/**
 * Tests that the process method is callable via the MatchKitsFacade.
 * Asserts that the method call returns true, indicating successful processing.
 * @return void
 */
