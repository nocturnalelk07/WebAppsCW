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
        //if i didnt want to use email as an example of a 1 to 1 relationship it would be
        //in the user table as there isnt much need for it to be seperate.

        //seeded user example will already have an email example and therefore doesn't
        //need an email generated for it, so start from 2.
        static $number_of_example_emails_plus_one = 2;
        return [
            "email" => fake()->safeEmail(),
            "user_id" => fake()->unique()->numberBetween($number_of_example_emails_plus_one,User::count()),
        ];
    }
}
