<?php

namespace Viviniko\Permission\Services;

interface PermissionService
{
    public function permissions();

    public function getPermission($id);

    public function createPermission(array $data);

    public function updatePermission($id, array $data);

    public function deletePermission($id);
}