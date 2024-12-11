<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //done seperately to use in the contains_image check
        $image = fake()->optional()->imageUrl($width = 640, $height = 480);
        
        return [
        "image_location" => $image,
        "contains_image" => !is_null($image),
        "comment_text" => fake()->paragraph(fake()->numberBetween(1,2), true),
        "user_id" => fake()->numberBetween(1,User::count()),
        "commentable_id" => fake()->numberBetween(1,Post::count()),
        "commentable_type" => fake()->randomElement(["App\Models\Post"])
        //, "App\Models\Comment"
        ];
    }
}
