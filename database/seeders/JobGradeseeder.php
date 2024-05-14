<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobGrade;


class JobGradeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobGrade::factory()->count(6)->create();

    }
}
