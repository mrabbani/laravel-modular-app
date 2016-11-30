<?php namespace WebEd\Base\ModulesManagement\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'WebEd\Base\ModulesManagement\Http\Controllers';

    public function map(Router $router)
    {

    }
}
