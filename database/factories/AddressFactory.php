<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

         return [
             'city' => $this->faker->unique()->randomElement([
                 'الشرقيه',
                 'القاهرة',
                 'الجيزه',
                 'الاسكندرية',
                 'بنها',
                 'السويس',
                 'الدقهلية',
                 'المنوفية',
                 'القليوبية',
                 'البحيرة',
                 'الغربية',
                 'بورسعيد',
                 'دمياط',
                 'الإسماعيلية',
                 'كفرالشيخ',
                 'الفيوم',
                 'بنى سويف',
                 'مطروح',
                 'شمال سيناء',
                 'جنوب سيناء',
                 'المنيا',
                 'أسيوط',
                 'سوهاج',
                 'قنا',
                 'البحر الأحمر',
                 'الأقصر',
                 'أسوان',
                 'الواحات',
                 'الوادي الجديد'
             ]),
         ];
    }
}
