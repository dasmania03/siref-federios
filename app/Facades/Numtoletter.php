<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class NumtoLetter extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'numtoletter';
    }
}