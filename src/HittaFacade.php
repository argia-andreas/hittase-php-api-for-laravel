<?php

namespace Grafstorm\Hitta;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Grafstorm\Hitta\Hitta
 */
class HittaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hittase-php-api-for-laravel';
    }
}
