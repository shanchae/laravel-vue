<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'buyer_id' => User::factory(),
            'total_price' => 0,
            'shipping_status' => fake()->randomElement(['pending', 'shipped']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid']),
            'shipping_address' => fake()->address(),
            'payment_method' => fake()->randomElement(['credit card', 'paypal', 'bank transfer', 'cash on delivery', 'e-wallet transfer'])           
        ];
    }

}
