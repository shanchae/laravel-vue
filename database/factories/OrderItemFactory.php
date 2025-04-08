<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
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
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'quantity' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat(2, 1, 100),
            'total_price' => function (array $attributes) {
                return $attributes['price'] * $attributes['quantity'];
            },
        ];
    }

    public function updateTotalPrice(): static
    {
        return $this->afterCreating(function () {
            $orders = Order::all();

            foreach ($orders as $order) {
                $orderItems = $order->orderItems;

                $totalPrice = 0;
                foreach ($orderItems as $item) {
                    $totalPrice += $item->total_price;
                }

                $order->update(['total_price' => $totalPrice]);
            }
        });
    }
}
   