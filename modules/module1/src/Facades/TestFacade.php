<?php namespace ModulerApp\Module\Module1\Facades;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'your-module-accessor';
    }
}
