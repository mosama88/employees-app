<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'محمد أسامه',
            'email' => 'mosama@dt.com',
            'password' => Hash::make('@Osama88'), // Hashing the password using bcrypt
        ],);
    
    
    DB::table('admins')->insert([
        'name' => 'هبة الله سمير',
        'email' => 'heba@dt.com',
        'password' => Hash::make('123456789'), // Hashing the password using bcrypt
    ],);

    
    }






    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
