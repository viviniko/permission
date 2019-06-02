<?php

namespace Viviniko\Permission\Repositories\Role;

use Viviniko\Repository\CrudRepository;

interface RoleRepository extends CrudRepository
{
	/**
	 * Get all system roles with number of users for each role.
	 *
	 * @return mixed
	 */
	public function getAllWithUsersCount();

	/**
	 * Update the permissions for given role.
	 *
	 * @param $roleId
	 * @param array $permissions
	 * @return mixed
	 */
	public function updatePermissions($roleId, array $permissions);

}