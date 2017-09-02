<?php

namespace Viviniko\Permission\Contracts;

interface RoleService
{

    /**
     * Lists all system roles into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return array
     */
    public function lists($column = 'display_name', $key = 'id');

    /**
     * Get all system roles with number of users for each role.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system role by id.
     *
     * @param $id Role Id
     * @return mixed
     */
    public function find($id);

    /**
     * Find role by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system role.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update specified role.
     *
     * @param $id Role Id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Remove role from repository.
     *
     * @param $id Role Id
     * @return bool
     */
    public function delete($id);

    /**
     * Update the permissions for given role.
     *
     * @param $roleId
     * @param array $permissions
     * @return mixed
     */
    public function updatePermissions($roleId, array $permissions);

}