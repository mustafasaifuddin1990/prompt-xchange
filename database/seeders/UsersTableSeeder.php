<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name" => "Admin",
            "user_slug" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("pass@admin"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
