<?php

namespace Database\Factories;

use App\Models\Job;
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
        $jobIds = Job::pluck('id')->toArray();

        if (empty($jobIds)) {
            // قم بإنشاء سجل افتراضي في جدول jobs إذا كان فارغًا
            $job = Job::create(['name' => 'Default Job']);
            $jobIds = [$job->id];
        }
        
        return [
            'name' => $this->faker->randomElement([
                'الأولى أ',
                'الأولى ب',
                'الثانية أ',
                'الثانية ب',
                'الثالثة أ',
                'الثالثة ب',
                'الثالثة ج',
                'الرابعة أ',
                'الرابعة ب',
            ]),
            'num_of_day' => $this->faker->numberBetween(10, 30),
            'job_id' => $this->faker->randomElement($jobIds),
        ];
    }
}
