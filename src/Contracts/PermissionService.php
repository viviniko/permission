<?php

namespace Viviniko\Permission\Contracts;

interface PermissionService
{
    /**
     * Finds the permission by given id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Creates new permission from provided data.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Updates specified permission.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * Remove specified permission from repository.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Lists all system permissions into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'display_name', $key = 'id');

}