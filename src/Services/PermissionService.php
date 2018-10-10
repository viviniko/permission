<?php

namespace Viviniko\Permission\Services;

interface PermissionService
{
    /**
     * Paginate users.
     *
     * @param $pageSize
     * @param string $requestParamName
     * @param array $wheres
     * @param array $orders
     * @return mixed
     */
    public function paginateUsers($pageSize, $requestParamName = 'search', $wheres = [], $orders = []);

    public function getUser($id);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function deleteUser($id);
}