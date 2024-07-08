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
            $table->string('urindoshlik_asasida');
            $table->string('pedagoglik');
            $table->string('lavozimi');
            $table->string('malumoti');
            $table->string('uzbek_panlar_azosi');
            $table->string('ilmiy_daraja');
            $table->string('ilmiy_daraja_yil');
            $table->string('ilmiy_unvoni');
            $table->string('ilmiy_unvoni_y');
            $table->string('ixtisosligi');
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
