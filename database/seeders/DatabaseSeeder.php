<?php

namespace Database\Seeders;

//use App\Models\User;
use App\Models\Animal;
use App\Models\Tag;
use App\Models\Post;
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
        $this->call(PostTableSeeder::class); //done (finish factory)
        $this->call(CommentTableSeeder::class); //TODO
        //populate post tag pivot table
        $tags = Tag::all();
        Post::all()->each(function($post) use($tags)
        {
          $post->tags()->attach($tags->random(rand(1,3))->pluck("id")->toArray());
        });
        

//        $this->call(AnimalTableSeeder::class);
  //      $this->call(EmergencyContactTableSeeder::class);
    }
}
