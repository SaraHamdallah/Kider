<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Student;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        Teacher::factory()->count(10)->create();
        $student = Student::factory()->count(30)->create();
        $courses =Course::factory()->count(10)->create();

        // Attach students to classes
        $courses->each(function ($course) use ($student) {
        // Attach a random number of children to each class
            $course->children()->attach(
                $student->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}