<?php

namespace Database\Factories;
use App\Models\Department;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class DepartmentFactory extends Factory
{

    protected $model = Department::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch' => $this->faker->unique()->randomElement([
                'نيابة السويس القسم الاول',
                'نيابة الاسماعيلية القسم الثانى',
                'نيابة السويس القسم الرابع',
                'نيابة التعليم القسم الاول',
                'نيابة جيزه خامس',
                ' فرع دعوى أسماعيلية',
                'مكتب فنى العريش',
            ]),
            'address_id' => Address::all()->random()->id,


        ];
    }
}
