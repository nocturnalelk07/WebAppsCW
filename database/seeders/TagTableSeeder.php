<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t = new Tag;
        $t->tag_name = "funny";
        $t->save();

        //maximum number of tags is determined by how many are in the factory array
        Tag::factory()->count(4)->create();
    }
}
