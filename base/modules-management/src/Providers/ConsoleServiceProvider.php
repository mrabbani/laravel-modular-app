<?php namespace WebEd\Base\ModulesManagement\Providers;

use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\ServiceProvider;
use WebEd\Base\ModulesManagement\Services\ModuleMigrator;

class ConsoleServiceProvider extends ServiceProvider
{
    protected $module = 'WebEd\Base\ModulesManagement';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->generatorCommands();
        $this->migrationCommands();
        $this->otherCommands();
    }

    private function generatorCommands()
    {
        $generators = [
            'webed.console.generator.make-module' => \WebEd\Base\ModulesManagement\Console\Generators\MakeModule::class,
            'webed.console.generator.make-provider' => \WebEd\Base\ModulesManagement\Console\Generators\MakeProvider::class,
            'webed.console.generator.make-controller' => \WebEd\Base\ModulesManagement\Console\Generators\MakeController::class,
            'webed.console.generator.make-middleware' => \WebEd\Base\ModulesManagement\Console\Generators\MakeMiddleware::class,
            'webed.console.generator.make-request' => \WebEd\Base\ModulesManagement\Console\Generators\MakeRequest::class,
            'webed.console.generator.make-model' => \WebEd\Base\ModulesManagement\Console\Generators\MakeModel::class,
            'webed.console.generator.make-repository' => \WebEd\Base\ModulesManagement\Console\Generators\MakeRepository::class,
            'webed.console.generator.make-facade' => \WebEd\Base\ModulesManagement\Console\Generators\MakeFacade::class,
            'webed.console.generator.make-service' => \WebEd\Base\ModulesManagement\Console\Generators\MakeService::class,
            'webed.console.generator.make-support' => \WebEd\Base\ModulesManagement\Console\Generators\MakeSupport::class,
            'webed.console.generator.make-view' => \WebEd\Base\ModulesManagement\Console\Generators\MakeView::class,
            'webed.console.generator.make-migration' => \WebEd\Base\ModulesManagement\Console\Generators\MakeMigration::class,
            'webed.console.generator.make-command' => \WebEd\Base\ModulesManagement\Console\Generators\MakeCommand::class,
        ];
        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }

    private function migrationCommands()
    {
        $this->registerModuleMigrator();
        $this->registerMigrateCommand();

    }

    private function registerMigrateCommand()
    {
        $commands = [
            'webed.console.command.module-migrate' => \WebEd\Base\ModulesManagement\Console\Migrations\ModuleMigrateCommand::class
        ];
        foreach ($commands as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
        $this->registerRollbackCommand();

    }
    private function otherCommands()
    {
        $commands = [
            'webed.console.command.cms-install' => \WebEd\Base\ModulesManagement\Console\Commands\InstallCmsCommand::class,
            'webed.console.command.module-install' => \WebEd\Base\ModulesManagement\Console\Commands\InstallModuleCommand::class,
            'webed.console.command.module-uninstall' => \WebEd\Base\ModulesManagement\Console\Commands\UninstallModuleCommand::class,
            'webed.console.command.disable-module' => \WebEd\Base\ModulesManagement\Console\Commands\DisableModuleCommand::class,
            'webed.console.command.enable-module' => \WebEd\Base\ModulesManagement\Console\Commands\EnableModuleCommand::class,
        ];
        foreach ($commands as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
    /**
     * Register the "rollback" migration command.
     *
     * @return void
     */
    protected function registerRollbackCommand()
    {
        $this->app->singleton('webed.console.command.migration-rollback', function ($app) {
            return new \WebEd\Base\ModulesManagement\Console\Migrations\RollbackCommand($app['module.migrator']);
        });
        $this->commands('webed.console.command.migration-rollback');
    }
    protected function registerModuleMigrator()
    {
        // The migrator is responsible for actually running and rollback the migration
        // files in the application. We'll pass in our database connection resolver
        // so the migrator can resolve any of these connections when it needs to.
        $this->app->singleton('module.migrator', function ($app) {

            return new ModuleMigrator($app);
        });
    }
}
