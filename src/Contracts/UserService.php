<?php

namespace Viviniko\Permission\Contracts;

interface UserService
{
    /**
     * Paginate users.
     *
     * @param mixed $query
     *
     * @return \Viviniko\Repository\Builder
     */
    public function search($query);

    /**
     * Find user by its id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create new user.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update user specified by it's id.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Delete user with provided id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Set specified role to specified user.
     *
     * @param $userId
     * @param $roleId
     * @return mixed
     */
    public function setRole($userId, $roleId);

}