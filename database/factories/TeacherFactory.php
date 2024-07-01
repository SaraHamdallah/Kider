<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName' => $this->faker->unique()->name,
            'phone' => $this->faker->unique()->phoneNumber,
            'image' => $this->faker->imageUrl, // Generates a random image URL
            'facebook' => $this->faker->optional()->regexify('https://www\.facebook\.com/[A-Za-z0-9]{5,10}'), // Generates a random URL or null
            'twitter' => $this->faker->optional()->regexify('https://www\.twitter\.com/[A-Za-z0-9]{5,10}'), // Generates a random URL or null
            'instagram' => $this->faker->optional('instagram')->url, // Generates a random URL or null
            'course_id' => Course::factory(), // Assumes you have a Course factory to create a related course
        ];
    }
}
