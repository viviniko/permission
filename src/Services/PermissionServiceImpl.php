<?php

namespace Viviniko\Permission\Services;

use Viviniko\Permission\Repositories\User\UserRepository;

class PermissionServiceImpl implements PermissionService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
}