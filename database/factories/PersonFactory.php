<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->image,
            'first_name' => $this->faker->name(),
            'middle_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->randomElement(['Male','Female']),
            'DOB' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'religion' => $this->faker->randomElement,
            'marital_status' => $this->faker->randomElement,
            'NO_of_children' => $this->faker->numberBetween(1,5),
            'nationality' => $this->faker->country(),
            'region' => $this->faker->country(),
            'region' => $this->faker->country(),
            'zone' => $this->faker->country(),
            'woreda' => $this->faker->country(),
            'kebele' => $this->faker->country(),
        ];
    }
}
