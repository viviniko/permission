<?php

namespace Viviniko\Permission\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Permission\Repositories\Permission\PermissionRepository;
use Viviniko\Permission\Repositories\User\UserRepository;
use Viviniko\Permission\Services\PermissionService;
use Viviniko\Repository\SearchPageRequest;
use Viviniko\Support\AbstractRequestRepositoryService;

class PermissionServiceImpl extends AbstractRequestRepositoryService implements PermissionService
{
    /**
     * @var \Viviniko\Permission\Repositories\Permission\PermissionRepository
     */
    protected $repository;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct(PermissionRepository $permissionRepository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $permissionRepository;
    }

    public function permissions()
    {
        return $this->repository->all();
    }

    public function getPermission($id)
    {
        return $this->repository->find($id);
    }

    public function createPermission(array $data)
    {
        return $this->repository->create($data);
    }

    public function updatePermission($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deletePermission($id)
    {
        return $this->repository->delete($id);
    }

    public function getRepository()
    {
        return $this->repository;
    }
}