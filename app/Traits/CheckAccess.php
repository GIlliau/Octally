<?php

namespace App\Traits;

use App\Models\User;

trait CheckAccess
{
    protected function checkAccess(int $userId, object $object): void {
        if ($userId === $object->user_id)
        {
            return;
        }

        if (User::find($userId)->hasRole('admin'))
        {
            return;
        }

        abort(403);
    }
}
