<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            //
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'image' => fake()->imageUrl(640, 480, 'business', true, 'Faker'),
            'category_id' => Category::factory(),
            'price' => fake()->randomFloat(2, 1, 100),
            'seller_id' => User::factory(),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
