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
        Schema::create('ilmiymaqolalars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kafedralar_id')->constrained();
            $table->enum('type', ['Respublika miqyosidagi jurnallar', 'Xalqaro miqyosidagi jurnallar']);
            $table->text('mavzu');
            $table->json('mualliflar_json'); // JSON formatida saqlash
            $table->date('chopq_sana'); // Yilni saqlash uchun `year` turini ishlatish
            $table->string('jurnal_nomi');
            $table->string('jurnal_soni');
            $table->string('jurnal_issn_raqami');
            $table->string('nashriyot');
            $table->text('annotatsiya');
            $table->string('fan_yunalishi');
            $table->string('url')->nullable();
            $table->string('doi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilmiymaqolalars');
    }
};
