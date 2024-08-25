<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $movie = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Generates a movie title with 3 words
            'director' => $this->faker->name, // Generates a random director's name
            'genre' => $this->faker->randomElement(['Action', 'Comedy', 'Drama', 'Horror', 'Romance', 'Thriller']), // Randomly picks a genre
            'release_year' => $this->faker->year, // Generates a random year
            'description' => $this->faker->paragraph, // Generates a random paragraph for the description
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
