<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EducationalInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::latest()->first()->id,
            'institution' => $this->faker->company(),
            'field' => $this->faker->name(),
            'level' => $this->faker->randomElement(['Phd.','Msc.','Bsc.']),
            'year_of_graduation' => $this->faker->year(),
            'GPA' => $this->faker->numberBetween(2.00, 4.00),
        ];
    }
}
