<?php

namespace Viviniko\Permission\Services;

interface PermissionService
{
    public function getUser($id);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function deleteUser($id);
}