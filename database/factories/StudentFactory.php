<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'rollNumber' => rand(1, 1000),
            'branch_id' => rand(1, 5),
            'student_category_id' => rand(1, 3),
            'email' => $this->faker->email,
            'password'=> 'password',
            'books_issue' => rand(1, 5),
        ];
    }
}
