<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromptCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Portrait', 'slug' => Str::slug('Portrait')],
            ['category_name' => 'Landscape', 'slug' => Str::slug('Landscape')],
            ['category_name' => 'Product', 'slug' => Str::slug('Product')],
            ['category_name' => 'City', 'slug' => Str::slug('City')],
            ['category_name' => 'Fashion', 'slug' => Str::slug('Fashion')],
            ['category_name' => 'Animals', 'slug' => Str::slug('Animals')],
            ['category_name' => 'Anime', 'slug' => Str::slug('Anime')],
            ['category_name' => 'Nature', 'slug' => Str::slug('Nature')],
        ];
        foreach ($categories as &$category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
        }

        DB::table('prompt_categories')->insert($categories);
    }
}
