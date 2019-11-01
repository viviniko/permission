<?php

namespace Viviniko\Permission;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Viviniko\Permission\Console\Commands\PermissionTableCommand;
use Viviniko\Permission\Listeners\UserEventSubscriber;

class PermissionServiceProvider extends BaseServiceProvider
{
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

        Event::subscribe(UserEventSubscriber::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->registerRepositories();

        $this->registerCommands();
    }

    private function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/permission.php', 'permission');
        $config = $this->app['config']['permission'];
        foreach (array_keys($config['models']) as $configKey) {
            if ($value = data_get($config, $configKey)) {
                $this->app['config']->set('permission.models.'.$configKey, $value);
            }
        }
        foreach (array_keys($config['tables']) as $configKey) {
            if (data_get($config, $configKey)) {
                $config['models'][$configKey] = $config[$configKey];
            }
        }
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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
        ];
    }
}