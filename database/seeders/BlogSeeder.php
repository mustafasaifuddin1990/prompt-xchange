<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Blog::create([
                'title' => $faker->sentence(6),
                'slug' => $faker->sentence(6),
                'image' => 'blogs/sample' . $i . '.png',
                'content' => $faker->paragraph(4),
                'publish_date' => $faker->date(),
                'reading_time' => $faker->numberBetween(3, 10) . ' Mins Read',
                'category_id' =>2,
            ]);
        }
    }
}
