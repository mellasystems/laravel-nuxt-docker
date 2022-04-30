<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->name(),
            'status' => $this->faker->boolean,
            'created_date' => now(),
            'sex' => $this->faker->randomElement(['masculine', 'feminine']),
            'salary' => $this->faker->randomDigit(),
        ];
    }
}
