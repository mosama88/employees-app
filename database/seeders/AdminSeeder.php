<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'Mohamed Osama',
            'email' => 'mosama@gamil.com',
            'password' => Hash::make('password'), // Hashing the password using bcrypt
        ],
        
    );
   

    DB::table('admins')->insert([
        'name' => 'Mahmoud fathi',
        'email' => 'mfathi@gamil.com',
        'password' => Hash::make('password'), // Hashing the password using bcrypt
    ],



);

DB::table('admins')->insert([
    'name' => 'Emad Ali',
    'email' => 'eali@gamil.com',
    'password' => Hash::make('password'), // Hashing the password using bcrypt
],
);
}
}
