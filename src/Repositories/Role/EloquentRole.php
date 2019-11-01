<?php

namespace Viviniko\Permission\Repositories\Role;

use Viviniko\Repository\EloquentRepository;
use Illuminate\Support\Facades\Config;

class EloquentRole extends EloquentRepository implements RoleRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('permission.models.role'));
    }
}