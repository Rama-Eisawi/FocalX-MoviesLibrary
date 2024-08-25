<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    protected $rating = Rating::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Randomly selects an existing user ID
            'movie_id' => Movie::inRandomOrder()->first()->id, // Randomly selects an existing movie ID
            'rating' => $this->faker->numberBetween(1, 5), // Generates a random rating between 1 and 5
            'review' => $this->faker->optional()->paragraph, // Optionally generates a review paragraph
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
