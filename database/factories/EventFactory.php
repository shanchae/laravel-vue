<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venue;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'venue_id' => Venue::factory(),
            'start_time' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
            'end_time' => fake()->dateTimeBetween('+2 weeks', '+3 weeks'),
            'organizer_id' => User::factory(),
            'banner_img' => fake()->imageUrl(640, 480, 'cats', true, 'Faker'),
        ];

    }
}
