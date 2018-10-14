<?php

namespace Viviniko\Permission;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Viviniko\Permission\Console\Commands\PermissionTableCommand;

class PermissionServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/permission.php' => config_path('permission.php'),
        ]);

        // Register commands
        $this->commands('command.permission.table');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/permission.php', 'permission');

        $config = $this->app['config']->get('entrust', []);
        $this->app['config']->set('entrust', array_merge($config, require __DIR__ . '/../config/permission.php'));

        $this->registerRepositories();

        $this->registerServices();

        $this->registerCommands();
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.permission.table', function ($app) {
            return new PermissionTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Register the user service provider.
     *
     * @return void
     */
    private function registerRepositories()
    {
        $this->app->singleton(
            \Viviniko\Permission\Repositories\User\UserRepository::class,
            \Viviniko\Permission\Repositories\User\EloquentUser::class
        );

        $this->app->singleton(
            \Viviniko\Permission\Repositories\Role\RoleRepository::class,
            \Viviniko\Permission\Repositories\Role\EloquentRole::class
        );

        $this->app->singleton(
            \Viviniko\Permission\Repositories\Permission\PermissionRepository::class,
            \Viviniko\Permission\Repositories\Permission\EloquentPermission::class
        );
    }

    private function registerServices()
    {
        $this->app->singleton(
            \Viviniko\Permission\Services\UserService::class,
            \Viviniko\Permission\Services\Impl\UserServiceImpl::class
        );
        $this->app->singleton(
            \Viviniko\Permission\Services\PermissionService::class,
            \Viviniko\Permission\Services\Impl\PermissionServiceImpl::class
        );
        $this->app->singleton(
            \Viviniko\Permission\Services\RoleService::class,
            \Viviniko\Permission\Services\Impl\RoleServiceImpl::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \Viviniko\Permission\Services\UserService::class,
            \Viviniko\Permission\Services\PermissionService::class,
            \Viviniko\Permission\Services\RoleService::class,
        ];
    }
}