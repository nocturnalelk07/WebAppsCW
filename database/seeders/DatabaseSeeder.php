<?php

namespace Database\Seeders;

//use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        order should be:
        user
        email
        tags
        posts
        comments might need to remove ability to reply to comments tbh
        */
        
        $this->call(UserTableSeeder::class); //done
        $this->call(EmailTableSeeder::class); //done
        $this->call(TagTableSeeder::class); //done
        $this->call(PostTableSeeder::class); //done
        $this->call(CommentTableSeeder::class);

//        $this->call(AnimalTableSeeder::class);
  //      $this->call(EmergencyContactTableSeeder::class);
    }
}
