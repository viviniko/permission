<?php

namespace Viviniko\Permission\Services;

interface UserService
{
    /**
     * Paginate users.
     *
     * @param $pageSize
     * @param array $wheres
     * @param array $orders
     * @return mixed
     */
    public function paginate($pageSize, $wheres = [], $orders = []);

    public function getUser($id);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function deleteUser($id);
}