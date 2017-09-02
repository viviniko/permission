<?php

namespace Viviniko\Permission\Services\Permission;

use Viviniko\Repository\SimpleRepository;
use Viviniko\Permission\Contracts\PermissionService as PermissionServiceInterface;

class EloquentPermission extends SimpleRepository implements PermissionServiceInterface
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