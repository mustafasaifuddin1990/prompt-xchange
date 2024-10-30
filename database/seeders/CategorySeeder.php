<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate 10 fake categories
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->word, // Generates a random word
                'slug' => $faker->slug, // Generates a random slug
            ]);
        }
    }
}
