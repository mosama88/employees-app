<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobGrade>
 */
class JobGradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['الأولى ب','الأولى أ','الثانية ب','الثانية أ','الثالثه ج','الثالثه ب','الثالثة أ']),
        ];
    }
}
