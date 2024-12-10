<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r = new Role;
        $r->role_role = "admin";
        $r->user_id = 1;
        $r->save();

        Role::factory()->count(User::count()-Role::count())->create();
    }
}
