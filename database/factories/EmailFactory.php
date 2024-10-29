<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //seeded user examples will already have email examples and dont need an email generated
        static $number_of_example_emails = 2;
        return [
            "email" => fake()->safeEmail(),
            
            "user_id" => fake()->unique()->numberBetween($number_of_example_emails,User::count()),
        ];
    }
}
