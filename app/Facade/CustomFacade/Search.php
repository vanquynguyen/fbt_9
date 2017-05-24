<?php

namespace App\Facade\CustomFacade;

use Illuminate\Support\Facades\Facade;

class Search extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Search';
    }
}
