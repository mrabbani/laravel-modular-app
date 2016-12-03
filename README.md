# Introduction
When you work on small project, you will feel laravel default structure 
is enough. But if your project grows up, Once you will think to divide 
your app into  module where each module will contain all of it resources
such as Controllers, Models, Views, Migrations, Config etc. These 
package will help you to manage laravel modular application easily.

### Installation

`composer require mrabbani/lara-module-manager`

Add the module manager service provider to `config/app.php` file

`Mrabbani\ModuleManager\Providers\ModuleProvider::class,`

To create new module run the bellow command:

`php artisan module:create name-of-your-module`

### Configuration 

By default all of your module will be placed inside `modules` directory
into your application's base directory. If you want to change publish 
`module_manager` config file by

`php artisan vendor:publish`

Now you can change the default *modules* directory by changing 
`module_directory` value of `config/module_manager.php` file.

### Available command

To see all module related command run `php artisan module` into terminal
Available commands are:

- `php artisan module:create {alias}`
- `php artisan module:install {alias}`
- `php artisan module:uninstall {alias}`
- `php artisan module:make:controller {alias} {ControllerName}`
- `php artisan module:make:middleware {alias} {MiddlewareName}`
- `php artisan module:make:migration {alias} {migration_name}`
- `php artisan module:make:model {alias} {ModelName}`
- `php artisan module:make:request {alias} {RequestName}`

