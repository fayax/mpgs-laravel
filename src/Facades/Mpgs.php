<?php

namespace MpgsLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Mpgs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mpgs';
    }
}

