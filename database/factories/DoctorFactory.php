<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->id(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phone(),
            'speciality' => $this->faker->speciality(),
            'room' => $this->faker->room(),
            'image' => $this->faker->image(),
        ];
    }
}
