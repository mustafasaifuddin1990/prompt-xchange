<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            "name" => "Admin",
            "slug" => "admin",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table("roles")->insert([
            "name" => "General User",
            "slug" => "general_user",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table("roles")->insert([
            "name" => "Content Creator",
            "slug" => "content_creator",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
