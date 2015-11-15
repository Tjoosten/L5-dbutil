<?php

namespace Tjoosten\Dbutil\Facades;

use Illuminate\Support\Facades\Facade;

class Dbutil extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Dbutil';
    }
}