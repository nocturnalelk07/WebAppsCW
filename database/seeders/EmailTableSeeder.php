<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $e = new Email;
        $e->email = "bob@email.com";
        $e->user_id = 1; //test user hard coded
        $e->save();

        //count should always stay the same as the factory for user for one to one relationship
        Email::factory()->count(50)->create();
    }
}
