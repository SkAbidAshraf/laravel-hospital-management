<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Services;
use App\Models\User;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        
        // Admin::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('12345678'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Admin::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'email_verified_at' => now(),
        //     'status'=> 'approved',
        //     'password' => bcrypt('12345678'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Services::factory(10)->create();
    }
}
