<?php

namespace Viviniko\Permission\Repositories\User;

use Viviniko\Repository\SimpleRepository;

class EloquentUser extends SimpleRepository implements UserRepository
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