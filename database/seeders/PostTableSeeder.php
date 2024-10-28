<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post;
        $p->image_location = "random/Image/Pathway";
        $p->contains_image = true;
        $p->post_title = "example title";
        $p->post_text = "this is the text on my post";
        $p->user_id = 1; // made by bob
        $p->save();
        $p->tags()->attach(1);
        $p->tags()->attach(4);

        Post::factory()->count(70)->create();
    }
}
