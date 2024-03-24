<?php

namespace Src\Facades;

use Illuminate\Support\Facades\Facade;

class MatchKitsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'matchKits';
    }
}
