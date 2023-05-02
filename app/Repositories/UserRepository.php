<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers(?int $perPage): object
    {
        return User::orderBy('id', 'desc')->paginate($perPage);
    }

    public function deleteUser(int $userId, int $authId): void
    {
        if ($userId !== $authId) {
            User::where('id', $userId)->delete();
        }
    }
}
