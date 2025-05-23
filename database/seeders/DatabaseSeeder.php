<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(5)->create();

         User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.admin',
             'password' => Hash::make('admin'),
             'role' => User::ROLE_ADMIN,
         ]);

         Post::factory(20)->create();

    }
}
