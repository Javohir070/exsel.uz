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
        Schema::create('intellektualmulks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kafedralar_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->text('mavzu');
            $table->date('nashr_sana'); // Yilni saqlash uchun `year` turini ishlatish
            $table->string('soni');
            $table->text('annotatsiya');
            $table->string('fan_yunalishi');
            $table->json('mualliflar_json'); // JSON formatida saqlash
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intellektualmulks');
    }
};
