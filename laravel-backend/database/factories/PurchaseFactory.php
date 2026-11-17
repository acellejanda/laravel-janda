<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<purchase>
 */

class PurchaseFactory extends Factory
{

 /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
       return [
    'total_price' => 0,
    'purchase_time' => fake()->dateTimeBetween('2023-01-01', '2025-12-31'),
    'payment_id' => fake()->numberBetween(1, 5),
];
    }
}