<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = fake()->optional()->imageUrl($width = 640, $height = 480);
        return [
            "image_location" =>$image,
            "contains_image" => !is_null($image),
            //"post_title" => fake()->sentence(fake()->numberBetween(4,8), true),
            "post_title" =>fake()->name(),
            "post_text" => fake()->paragraph(fake()->numberBetween(1,2), true),
            "user_id" => fake()->numberBetween(2,User::count()),
        ];
    }
}
