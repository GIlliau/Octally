<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $guard = 'web';

        $roles = [
            ['name' => 'admin', 'guard_name' => $guard]
        ];

        DB::table('roles')->insert($roles);
    }
}
