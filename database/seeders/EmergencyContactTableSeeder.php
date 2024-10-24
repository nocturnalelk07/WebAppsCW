<?php

namespace Database\Seeders;

use App\Models\EmergencyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new EmergencyContact;
        $c->name = "Jane";
        $c->phone_number = "test number";
        $c->animal_id = 1; //Holly
        $c->save();

        EmergencyContact::factory()->count(10)->create();
    }
}
