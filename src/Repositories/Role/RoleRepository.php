<?php

namespace Viviniko\Permission\Repositories\Role;

use Viviniko\Permission\Models\Role;

interface RoleRepository
{
	/**
	 * Lists all system roles into $key => $column value pairs.
	 *
	 * @param string $column
	 * @param string $key
	 * @return mixed
	 */
	public function pluck($column, $key = 'id');

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
	 * @return Role|null
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
	 * @return Role
	 */
	public function create(array $data);

	/**
	 * Update specified role.
	 *
	 * @param $id Role Id
	 * @param array $data
	 * @return Role
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