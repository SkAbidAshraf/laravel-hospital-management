<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $name = fake()->name(),
            'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
            'email_verified_at' => now(),
            'status' => 'approved',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ];
    }
}
