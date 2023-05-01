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
        $ticket = Ticket::find(7);
        dd($ticket->admin());
//        $admin = Admin::first();
//        dd($admin->folders()->get()->toArray());

//        $user = User::find(1);
//        $perm = Permission::first();
//        $user->givePermissionTo($perm);

//        $role = Role::find(1);
//        $role->givePermissionTo('edit articles');
//        dd($role);

//        $category = Category::get();
//
//        dd($category[0]->name);

//        $user = User::first();

//        $posts = DB::connection('mysql2')->table('posts')->get();
//        dd($posts);
    }
}
