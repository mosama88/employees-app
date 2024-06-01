<?php

namespace Database\Factories;

use App\Models\JobGrade;
use App\Models\Address;
use App\Models\Department;
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
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['احمد الأدغم', 'طارق حامد', 'يحي حسن', 'محمد أسامه', 'علاء رجب', 'حسن شوقى']),
            'phone' => $this->faker->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'alter_phone'=>$this->faker->regexify('/^(012|015|010|011)[0-9]{8}$/'),
            'hiring_date' => $this->faker->dateTimeBetween('2000-05-01', '2016-05-01')->format('Y-m-d'),
            'start_from'=>$this->faker->dateTimeBetween('2000-05-01', '2016-05-01')->format('Y-m-d'),
            'num_of_days' => $this->faker->numberBetween(20, 40),
            'job_grades_id'=>JobGrade::all()->random()->id,
            'address_id'=>Address::all()->random()->id,
            'department_id'=>Department::all()->random()->id,
        ];
    }
}
