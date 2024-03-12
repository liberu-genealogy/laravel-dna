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
/**
 * This facade provides a simplified interface to the match kits functionality,
 * allowing easy access to kit matching operations within the application.
 */
    /**
     * Get the registered name of the component.
     *
     * @return string The name of the bound instance in the container.
     */
