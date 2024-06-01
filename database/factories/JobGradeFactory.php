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
            'grade' => $this->faker->unique()->randomElement([
                'الأولى أ',
                'الأولى ب',
                'الثانية أ',
                'الثانية ب',
                'الثالثة أ',
                'الثالثه ب',
                'الثالثه ج',
                'الرابعه أ',
                'الرابعه ب',
            ]),
            'name' => $this->faker->unique()->randomElement([
                'باحث تنمية إدارية',
                'كاتب رابع',
            ])
        ];
    }
}
