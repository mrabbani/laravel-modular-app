<?php namespace WebEd\Base\Test\Providers;

use Illuminate\Support\ServiceProvider;

class UninstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'WebEd\Base\Test';

    protected $moduleAlias = 'test';

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
        acl_permission()
        ->unsetPermissionByModule($this->module);

        $this->dropSchema();
    }

    private function dropSchema()
    {
        //\Schema::dropIfExists('table-name');
    }
}
