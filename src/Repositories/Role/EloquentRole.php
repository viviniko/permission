<?php

namespace Viviniko\Permission\Repositories\Role;

use Illuminate\Support\Facades\DB;
use Viviniko\Repository\EloquentRepository;
use Illuminate\Support\Facades\Config;

class EloquentRole extends EloquentRepository implements RoleRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('permission.role'));
    }

    /**
	 * {@inheritdoc}
	 */
	public function getAllWithUsersCount()
    {
		$roleUserTable = Config::get('permission.role_user_table');
		$rolesTable = Config::get('permission.roles_table');

		return $this->createQuery()
            ->leftJoin($roleUserTable, "{$rolesTable}.id", '=', "{$roleUserTable}.role_id")
			->select("{$rolesTable}.*", DB::raw("count({$roleUserTable}.user_id) as users_count"))
			->groupBy("{$rolesTable}.id")
			->get();
	}

	/**
	 * {@inheritdoc}
	 */
	public function updatePermissions($roleId, array $permissions)
    {
		$role = $this->find($roleId);

		$role->perms()->sync($permissions);
	}

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return $this->findBy('name', $name);
    }
}