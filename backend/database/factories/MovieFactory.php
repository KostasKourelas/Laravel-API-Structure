<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{

    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(5);
        $description = $this->faker->paragraph(4);
        $categories = ['Action', 'Drama', 'Comedy', 'Sci-Fi', 'Horror', 'Romance', 'Adventure'];
        $category = $this->faker->randomElement($categories);
        $year = $this->faker->numberBetween(1950, 2023);

        return [
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'year' => $year,
        ];
    }
}
