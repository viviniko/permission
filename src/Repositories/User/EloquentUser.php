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

    /**
     * {@inheritdoc}
     */
    public function setRole($userId, $roleId)
    {
        $roleId = is_array($roleId) ?: [$roleId];

        return $this->find($userId)->roles()->sync($roleId);
    }
}