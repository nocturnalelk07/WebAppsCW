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
        $this->call(UserTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);

        //this populates the post_tag pivot table giving each post 1-3 tags randomly
        $tags = Tag::all();
        Post::all()->each(function($post) use($tags)
        {
          $post->tags()->attach($tags->random(rand(1,3))->pluck("id")->toArray());
        });
    }
}
