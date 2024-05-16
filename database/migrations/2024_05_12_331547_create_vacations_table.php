<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
                                                 // مأمورية     سنوى       أعتيادى        عارضة       مرضى
            $table->enum('type',['satisfying', 'emergency', 'regular','Annual', 'mission'])->default('emergency')->nullable();
            $table->date('start')->nullable();
            $table->date('to')->nullable();
            $table->text('notes')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacations');
    }
};
