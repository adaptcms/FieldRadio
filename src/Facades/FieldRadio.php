<?php

namespace Adaptcms\FieldRadio\Facades;

use Illuminate\Support\Facades\Facade;

class FieldRadio extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FieldRadio';
    }
}
