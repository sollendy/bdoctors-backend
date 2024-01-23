<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->name(),
            'lastname' =>fake()->lastName(),
            'email' => fake()->email(),
            'text' => fake()->text(),
            'created_at' => fake()->dateTime(now()),
            'updated_at' => fake()->dateTime(now())
        ];
    }
}
