<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankInfo>
 */
class BankInfoFactory extends Factory
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
            'full_name' => $this->faker->name(),
            'bank_name' => $this->faker->name(),
            'account_number' => $this->faker->numberBetween(10000, 100000),
            'account_type' => $this->faker->randomElement(['Saving', 'Checking', 'Other']),
        ];
    }
}
