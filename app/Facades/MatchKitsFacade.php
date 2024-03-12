<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MatchKitsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'matchKits';
    }
}
