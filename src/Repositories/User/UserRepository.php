<?php

namespace Viviniko\Permission\Repositories\User;

use Viviniko\Repository\CrudRepository;

interface UserRepository extends CrudRepository
{
    /**
     * Set specified role to specified user.
     *
     * @param $userId
     * @param $roleId
     * @return mixed
     */
    public function setRole($userId, $roleId);
}