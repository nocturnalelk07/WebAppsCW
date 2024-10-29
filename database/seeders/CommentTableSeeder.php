<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment;
        $c->image_location = null;
        $c->contains_image = false;
        $c->comment_text = "op is probably a bot";
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();
        Comment::factory()->count(10)->create();
    }
}
