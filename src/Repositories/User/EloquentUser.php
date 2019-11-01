<?php

namespace Viviniko\Permission\Repositories\User;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentUser extends EloquentRepository implements UserRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('permission.user'));
    }
}