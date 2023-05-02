<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getUsers(?int $perPage);
    public function deleteUser(int $userId, int $authId);
}
