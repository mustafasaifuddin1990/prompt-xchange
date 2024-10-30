<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PromptCategorySeeder::class);
//        $this->call(BlogSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(RoleSeeder::class);
//        $this->call(UsersTableSeeder::class);
    }
}
