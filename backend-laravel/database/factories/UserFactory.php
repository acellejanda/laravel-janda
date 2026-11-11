<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
    'email' => fake()->unique()->safeEmail(),
    'username' => fake()->unique()->lexify('user_?????'),
    'password' => bcrypt('password'),
    'first_name' => fake()->firstName(),
    'last_name' => fake()->lastName(),
    'phone_number' => fake()->numerify('09#########'),
    'last_login_time' => fake()->dateTimeThisYear(),
    'address_id' => fake()->numberBetween(1, 50),
];
    }
}