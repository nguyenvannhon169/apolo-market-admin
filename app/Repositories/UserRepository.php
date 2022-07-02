<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{

    public function getFieldsSearchable()
    {

    }

    public function model()
    {
        return User::class;
    }

    public function findAndUpdateAccountByGoogle($googleId, array $attributes)
    {
        $query = $this->model->newQuery();

        $user = $query->where('google_id', $googleId)->firstOrFail();

        $user->fill($attributes);

        $user->save();

        return $user;
    }

}
