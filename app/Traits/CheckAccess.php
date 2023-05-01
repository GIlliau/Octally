<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

trait CheckAccess
{
    protected function checkAccess(int $userId, Post | Comment $object): void {
        if ($userId === $object->user_id)
        {
            return;
        }

        if (User::find($userId)->hasRole('admin'))
        {
            return;
        }

        throw new \DomainException("Don't have enough rights to do this");
    }
}
