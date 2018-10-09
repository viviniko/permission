<?php

namespace Viviniko\Permission\Repositories\Permission;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentPermission extends EloquentRepository implements PermissionRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('permission.permission'));
    }
}