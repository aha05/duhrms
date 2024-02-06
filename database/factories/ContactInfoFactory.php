<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInfo>
 */
class ContactInfoFactory extends Factory
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
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'phone'  => $this->faker->phoneNumber,
            'address' => $this->faker->address(),
            'relationship' => $this->faker->randomElement(['father', 'mather']),
        ];
    }
}
