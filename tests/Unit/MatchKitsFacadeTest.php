<?php

namespace Tests\Unit;

use Tests\TestCase;
use LaravelDna\Facades\MatchKitsFacade;
use Dna\MatchKits;
use Illuminate\Support\Facades\App;

class MatchKitsFacadeTest extends TestCase
{
    public function test_facade_resolves_to_matchkits_instance()
    {
        $matchKitsInstance = App::make('matchKits');
        $this->assertInstanceOf(MatchKits::class, $matchKitsInstance);
    }

    public function test_matchKits_method_is_callable_via_facade()
    {
        $matchKitsMock = \Mockery::mock(MatchKits::class);
        $matchKitsMock->shouldReceive('matchKits')->once()->andReturnNull();

        App::instance('matchKits', $matchKitsMock);

        MatchKitsFacade::matchKits();
        
        \Mockery::close();
    }
}
