<?php

namespace Viviniko\Permission\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class PermissionTableCommand extends CreateMigrationCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'permission:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for the admin service table';

    /**
     * @var string
     */
    protected $stub = __DIR__.'/stubs/permission.stub';

    /**
     * @var string
     */
    protected $migration = 'create_permission_table';
}
