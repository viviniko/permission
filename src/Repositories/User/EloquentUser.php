<?php

namespace Viviniko\Permission\Repositories\User;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentUser extends EloquentRepository implements UserRepository
{
    protected $searchRules = [
        'id',
        'email' => 'like',
        'firstname' => 'like',
        'lastname' => 'like',
        'name' => 'firstname:like|lastname:like',
        'is_active',
        'phone' => 'like',
        'created_at' => 'betweenDate',
        'log_date' => 'betweenDate',
    ];

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