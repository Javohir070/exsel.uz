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
        Schema::create('dalolatnomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kafedralar_id')->constrained()->cascadeOnDelete();
            $table->text('name'); // Name ustuni
            $table->string('raqami'); // Raqami ustuni
            $table->text('joyiye_obyekti'); // Joyiye obyekti ustuni
            $table->text('joyiye_maqsadi'); // Joyiye maqsadi ustuni
            $table->text('joyiye_asos'); // Joyiye asos ustuni
            $table->text('joyiye_tashkilot'); // Joyiye tashkilot ustuni
            $table->text('joyiye_tarmoq'); // Joyiye tarmoq ustuni
            $table->string('asoslovchi_hujjat'); // Asoslovchi hujjat ustuni
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dalolatnomas');
    }
};
