<?php

namespace Database\Factories;

use App\Models\EmergencyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyContact>
 */
class EmergencyContactFactory extends Factory
{
    //start from 2 because 1 is used by the manual seeding
    private static $order = 2;
    protected $model = EmergencyContact::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
        "name" => fake()->name(),
        "phone_number" =>fake()->randomNumber(),
        "animal_id" => self::$order++,
        ];
    }
}
