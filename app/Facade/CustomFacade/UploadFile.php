<?php

namespace App\Facade\CustomFacade;

use Illuminate\Support\Facades\Facade;

class UploadFile extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UploadFile';
    }
}
