<?php

namespace Viviniko\Permission\Services\User;

use Viviniko\Repository\SimpleRepository;
use Viviniko\Permission\Contracts\UserService as UserServiceInterface;

class EloquentUser extends SimpleRepository implements UserServiceInterface
{
    use ValidatesUserData;

    protected $modelConfigKey = 'permission.user';

    protected $fieldSearchable = [
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

    /**
     * {@inheritdoc}
     */
    public function setRole($userId, $roleId)
    {
        $roleId = is_array($roleId) ?: [$roleId];

        return $this->find($userId)->roles()->sync($roleId);
    }
}