<?php

namespace Dulithaks\NumberToSinhalaWords\Facades;

use Illuminate\Support\Facades\Facade;

class NumberToSinhalaWords extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'number-to-sinhala-words';
    }
}
