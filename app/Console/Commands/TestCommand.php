<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admin = User::find(1);
        $adminRole = \Spatie\Permission\Models\Role::find('1');
        $admin->assignRole($adminRole);
    }
}
