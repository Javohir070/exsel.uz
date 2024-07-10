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
        Schema::create('xodimlars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('fish');
            $table->string('jshshir');
            $table->string('jinsi');
            $table->string('yil');
            $table->string('ish_tartibi');
            $table->string('shtat_birligi');
            $table->string('urindoshlik_asasida')->nullable();
            $table->string('pedagoglik');
            $table->string('lavozimi');
            $table->string('malumoti')->nullable();
            $table->string('uzbek_panlar_azosi')->nullable();
            $table->string('ilmiy_daraja')->nullable();
            $table->string('ilmiy_daraja_yil')->nullable();
            $table->string('ilmiy_unvoni')->nullable();
            $table->string('ilmiy_unvoni_y')->nullable();
            $table->string('ixtisosligi')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xodimlars');
    }
};
