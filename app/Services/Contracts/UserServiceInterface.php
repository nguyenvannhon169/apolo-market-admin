<?php

namespace App\Services\Contracts;

use App\Repositories\Contracts\UserRepositoryInterface;

interface UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository);

    public function findAndUpdateAccountByGoogle($googleId, array $attributes);
}
