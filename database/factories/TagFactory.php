<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //really tags are kind of hard-coded since there isnt a need for random tags to be made but im using this to show a many to many relationship in the factories
            "tag_name" => fake()->unique()->randomElement(["cooking","memes","gaming","wholesome"]),
        ];
    }
}
