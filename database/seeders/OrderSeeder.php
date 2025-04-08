<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem; // Assuming you have an OrderItem model

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Order::factory()
        ->count(10) // Create 10 orders
        ->has(
            OrderItem::factory()
                ->count(fake()->numberBetween(1, 5)) // Each order has 1-5 order items
                ->updateTotalPrice() // Call the custom method to update total price
        )
        ->create();;

    }
}
