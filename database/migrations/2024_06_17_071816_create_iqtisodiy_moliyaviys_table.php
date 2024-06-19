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
        Schema::create('iqtisodiy_moliyaviys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->string('kadastr_raqami');
            $table->string('u_maydoni');
            $table->string('taj_maydonlari');
            $table->string('binolar_soni');
            $table->string('auditoriya_sigimi');
            $table->string('k_xaj_auditor_soni');
            $table->string('pondi_miqdori');
            $table->string('ilmiyp_bulinalar');
            $table->string('gaz');
            $table->string('elektr');
            $table->string('suv');
            $table->string('kanalizasiya');
            $table->string('internet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iqtisodiy_moliyaviys');
    }
};
