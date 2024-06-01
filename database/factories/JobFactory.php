<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'باحث تنمية إدارية',
                'باحث ثالث تمويل ومحاسبة',
                'كاتب رابع',
                'فني رابع بالمجموعة النوعية',
                'حرفي مساعد',
                'خدمات معاونة',
            ]),
        ];
    }
}
