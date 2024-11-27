<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new User;
        $u->email = "bob@email.com";
        $u->name = "Bob The Tester";
        $u->password = "passWord(verySafe)";
        $u->save();

        User::factory()->count(50)->create();
    }
}
