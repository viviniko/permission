<?php

namespace Viviniko\Permission\Services;

use Illuminate\Http\Request;
use Viviniko\Permission\Repositories\Permission\PermissionRepository;
use Viviniko\Permission\Repositories\User\UserRepository;
use Viviniko\Repository\SearchPageRequest;

class PermissionServiceImpl implements PermissionService
{
    /**
     * @var \Viviniko\Permission\Repositories\User\UserRepository
     */
    protected $userRepository;

    /**
     * @var \Viviniko\Permission\Repositories\Permission\PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $searchRules = [
        'id',
        'email' => 'like',
        'firstname' => 'like',
        'lastname' => 'like',
        'name' => 'firstname:like|lastname:like',
        'is_active',
        'phone' => 'like',
        'created_at' => 'betweenDate',
        'log_date' => 'betweenDate',
    ];

    public function __construct(UserRepository $userRepository, PermissionRepository $permissionRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function paginateUsers($pageSize, $requestParamName = 'search', $wheres = [], $orders = [])
    {
        return $this->userRepository->search(
            SearchPageRequest::create($pageSize, $wheres, $orders)
                ->rules($this->searchRules)
                ->request($this->request, $requestParamName)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getUser($id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function updateUser($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

    public function permissions()
    {
        return $this->permissionRepository->all();
    }
}