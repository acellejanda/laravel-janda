<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //
        return [
    'code' => fake()->unique()->bothify('PRD-########'),   
    'name' => fake()->words(2, true),
    'description' => fake()->sentence(),
    'manufacturer' => fake()->randomElement(['Apple', 'Sony', 'Samsung', 'Dell', 'Logitech']),
    'photo' => fake()->imageUrl(),
    'price' => fake()->randomFloat(2, 10, 100),
    'cost' => fake()->randomFloat(2, 5, 60),
    'inventory_quantity' => fake()->numberBetween(0, 200),
];
    }

}
