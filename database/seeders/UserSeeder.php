<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Rasha Mousa',
            'email' => 'rmousa@gamil.com',
            'password' => Hash::make('password'), // Hashing the password using bcrypt
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmed Azzoz',
            'email' => 'azooz@gamil.com',
            'password' => Hash::make('password'), // Hashing the password using bcrypt
        ]);

        DB::table('users')->insert([
            'name' => 'Menan Ahmed',
            'email' => 'menan@gamil.com',
            'password' => Hash::make('password'), // Hashing the password using bcrypt
        ]);
    }
}
