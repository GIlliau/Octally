<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'root',
                'email' => 'admin@mail.com',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password' => Hash::make('qwerty1234!'),
            ]
        ];

        DB::table('users')->insert($admins);

        $admin = User::find(1);
        $adminRole = Role::find('1');
        $admin->assignRole($adminRole);
    }
}
