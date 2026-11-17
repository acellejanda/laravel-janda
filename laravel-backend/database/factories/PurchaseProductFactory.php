<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseProductFactory extends Factory
{
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();

        if (!$product) {
            $product = Product::factory()->create();
        }

        return [
            'purchase_id' => Purchase::inRandomOrder()->value('purchase_id'),
            'code' => $product->code,
            'product_price' => $product->price,
            'product_quantity' => fake()->numberBetween(1, 5),
            'product_name' => $product->name,
        ];
    }
}