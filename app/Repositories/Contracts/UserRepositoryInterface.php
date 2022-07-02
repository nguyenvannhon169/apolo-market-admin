<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function findAndUpdateAccountByGoogle($googleId, array $attributes);
}
