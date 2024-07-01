<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'className' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 1000),  // Generates a random float with 2 decimal places between 100 and 1000
            'capacity' => $this->faker->numberBetween(10, 30),  // Generates a random number between 10 and 100
            'image' => $this->faker->imageUrl,  // Generates a random image URL
            'age' => $this->faker->regexify('^\d{1,2}-\d{1,2}$'),  // Generates a string matching the regex
            'startTime' => $this->faker->regexify('^(1[012]|[1-9])\s*-\s*(1[012]|[1-9])\s*AM$'),  // Generates a string matching the regex
            'publish' => $this->faker->boolean,  // Generates a random boolean value
        ];
    }
}
