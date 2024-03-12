&lt;?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Facades\MatchKitsFacade;
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
