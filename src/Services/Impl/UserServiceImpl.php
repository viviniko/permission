<?php

namespace Viviniko\Permission\Services\Impl;

use Illuminate\Http\Request;
use Viviniko\Permission\Repositories\User\UserRepository;
use Viviniko\Permission\Services\UserService;
use Viviniko\Support\AbstractRequestRepositoryService;

class UserServiceImpl extends AbstractRequestRepositoryService implements UserService
{
    protected $repository;

    public function __construct(UserRepository $repository, Request $request)
    {
        parent::__construct($request);
        $this->repository = $repository;
    }

    /**
     * @var array
     */
    protected $searchRules = [
        'id',
        'email' => 'like',
        'first_name' => 'like',
        'last_name' => 'like',
        'name' => 'first_name:like|last_name:like',
        'is_active',
        'phone' => 'like',
        'created_at' => 'betweenDate',
        'log_date' => 'betweenDate',
    ];

    /**
     * {@inheritdoc}
     */
    public function getUser($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function createUser(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function updateUser($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUser($id)
    {
        return $this->repository->delete($id);
    }

    public function getRepository()
    {
        return $this->repository;
    }
}