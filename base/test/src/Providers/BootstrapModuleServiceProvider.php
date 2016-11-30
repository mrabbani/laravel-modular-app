<?php namespace WebEd\Base\Test\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
{
    protected $module = 'WebEd\Base\Test';

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
        /**
         * Register to dashboard menu
         */
        /*\DashboardMenu::registerItem([
            'id' => 'test',
            'piority' => 20,
            'parent_id' => null,
            'heading' => null,
            'title' => 'WebEd test',
            'font_icon' => 'icon-puzzle',
            'link' => '',
            'css_class' => null,
        ]);*/
    }
}
