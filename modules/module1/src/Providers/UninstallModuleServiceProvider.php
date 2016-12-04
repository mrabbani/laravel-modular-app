<?php namespace ModulerApp\Module\Module1\Providers;

use Illuminate\Support\ServiceProvider;

class UninstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'ModulerApp\Module\Module1';

    protected $moduleAlias = 'module1';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    private function booted()
    {
        $this->dropSchema();
    }

    private function dropSchema()
    {
        //If you want to rollback your module migration
        // uncomment bellow statement
         
//        \Artisan::call('module:migrate:rollback', ['alias' => $this->moduleAlias]);

    }
}
