<?php

namespace Viviniko\Permission\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Permission\Repositories\Role\RoleRepository;
use Viviniko\Permission\Services\RoleService;
use Viviniko\Support\AbstractRequestRepositoryService;

class RoleServiceImpl extends AbstractRequestRepositoryService implements RoleService
{
    protected $repository;

    public function __construct(RoleRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getRole($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function createRole(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function updateRole($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteRole($id)
    {
        return $this->repository->delete($id);
    }

    public function getRepository()
    {
        return $this->repository;
    }
}