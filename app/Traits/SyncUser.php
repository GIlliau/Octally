<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\User;

trait SyncUser
{
    public function syncUser(int $userId): void {
        $admin = Admin::find($userId);
        $user = User::find($userId);

        if ($admin && $user && (strtolower($admin->account) === strtolower($user->account))) {
            $user->update([
                'email' => $admin->email,
                'name' => $admin->name,
                'avatar' => $admin->avatar,
            ]);
        }
    }
}
