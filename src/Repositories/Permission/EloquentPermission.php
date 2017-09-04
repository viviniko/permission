<?php

namespace Viviniko\Permission\Repositories\Permission;

use Viviniko\Repository\SimpleRepository;

class EloquentPermission extends SimpleRepository implements PermissionRepository
{
    protected $modelConfigKey = 'permission.permission';

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'display_name', $key = 'id')
    {
        return $this->pluck($column, $key);
    }
}