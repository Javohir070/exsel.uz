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
        Schema::create('loyihaijrochilars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ilmiy_loyiha_id')->constrained('ilmiy_loyihas')->cascadeOnDelete();
            $table->string('fio');
            $table->string('jshshir');
            $table->string('science_id');
            $table->string('shtat_birligi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyihaijrochilars');
    }
};
