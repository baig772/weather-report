<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'password' => bcrypt('password'),
            'email' => fake()->unique()->safeEmail(),
            'name' => fake()->name(),
        ];
    }
}
