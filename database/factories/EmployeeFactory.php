<?php

namespace Database\Factories;
use App\Models\Person;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'person_id' => Person::latest()->first()->id,
            'emp_id' => $this->faker->userName(),
            'job_title' => $this->faker->name(),
            'position' => $this->faker->name(),
            'employment_type' => $this->faker->randomElement(['full_time','part_time','temporary']),
            'date_of_hire' => $this->faker->date(),
            'location' => $this->faker->country(),
            'status' => $this->faker->randomElement(['active','leave','retire']),
        ];
    }
}
