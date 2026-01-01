<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@blog.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        
        // Create some test posts
        \App\Models\Post::factory(10)->create([
            'user_id' => 1,
            'status' => 'published',
        ]);
    }
}