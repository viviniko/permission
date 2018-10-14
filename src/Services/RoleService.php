<?php

namespace Viviniko\Permission\Services;

interface RoleService
{
    public function paginate($pageSize, $wheres = [], $orders = []);

    public function getRole($id);

    public function createRole(array $data);

    public function updateRole($id, array $data);

    public function deleteRole($id);
}