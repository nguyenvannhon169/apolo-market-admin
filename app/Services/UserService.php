<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAndUpdateAccountByGoogle($googleId, array $attributes)
    {
        return $this->userRepository->findAndUpdateAccountByGoogle($googleId, $attributes);
    }
}
