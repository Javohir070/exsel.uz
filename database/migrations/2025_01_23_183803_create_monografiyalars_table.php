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
        Schema::create('monografiyalars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kafedralar_id')->constrained();
            $table->text('name');
            $table->year('nashr_yili'); // Yilni saqlash uchun `year` turini ishlatish
            $table->text('chop_etil_nashriyot');
            $table->string('til');
            $table->string('fan_yunalishi');
            $table->string('asoslovchi_hujjat');
            $table->string('kbk')->nullable();
            $table->string('isbn')->nullable();
            $table->json('mualliflar_json'); // JSON formatida saqlash
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monografiyalars');
    }
};
