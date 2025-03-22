<?php

declare(strict_types=1);

namespace Src\Facades;

use Illuminate\Support\Facades\Facade;

final class MatchKitsFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'matchKits';
    }
}