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
        Schema::create('intellektuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ilmiy_loyiha_id')->constrained('ilmiy_loyihas')->cascadeOnDelete();
            $table->unsignedInteger('mal_jur_reja')->nullable();
            $table->unsignedInteger('mal_jur_amalda')->nullable();
            $table->text('mal_jur_izoh')->nullable();
            $table->unsignedInteger('xor_jur_reja')->nullable();
            $table->unsignedInteger('xor_jur_amalda')->nullable();
            $table->text('xor_jur_izoh')->nullable();
            $table->unsignedInteger('web_jur_reja')->nullable();
            $table->unsignedInteger('web_jur_amalda')->nullable();
            $table->text('web_jur_izoh')->nullable();
            $table->unsignedInteger('tezislar_reja')->nullable();
            $table->unsignedInteger('tezislar_amalda')->nullable();
            $table->text('tezislar_izoh')->nullable();
            $table->unsignedInteger('ilmiy_mon_reja')->nullable();
            $table->unsignedInteger('ilmiy_mon_amalda')->nullable();
            $table->text('ilmiy_mon_izoh')->nullable();
            $table->unsignedInteger('nashr_uquv_reja')->nullable();
            $table->unsignedInteger('nashr_uquv_amalda')->nullable();
            $table->text('nashr_uquv_izoh')->nullable();
            $table->unsignedInteger('darslik_reja')->nullable();
            $table->unsignedInteger('darslik_amalda')->nullable();
            $table->text('darslik_izoh')->nullable();
            $table->unsignedInteger('b_bitiruv_mreja')->nullable();
            $table->unsignedInteger('b_bitiruv_mamalda')->nullable();
            $table->text('b_bitiruv_izoh')->nullable();
            $table->unsignedInteger('m_bitiruv_dreja')->nullable();
            $table->unsignedInteger('m_bitiruv_damalda')->nullable();
            $table->text('m_bitiruv_izoh')->nullable();
            $table->unsignedInteger('p_bitiruv_dreja')->nullable();
            $table->unsignedInteger('p_bitiruv_damalda')->nullable();
            $table->text('p_bitiruv_izoh')->nullable();
            $table->unsignedInteger('i_mulk_areja')->nullable();
            $table->unsignedInteger('i_mulk_aamalda')->nullable();
            $table->text('i_mulk_izoh')->nullable();
            $table->unsignedInteger('ixtiro_olingan_psreja')->nullable();
            $table->unsignedInteger('ixtiro_olingan_psamalda')->nullable();
            $table->text('ixtiro_olingan_izoh')->nullable();
            $table->unsignedInteger('ixtiro_ber_psreja')->nullable();
            $table->unsignedInteger('ixtiro_ber_psamalda')->nullable();
            $table->text('ixtiro_ber_izoh')->nullable();
            $table->unsignedInteger('dasturiy_gsreja')->nullable();
            $table->unsignedInteger('dasturiy_gsamalda')->nullable();
            $table->text('dasturiy_izoh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intellektuals');
    }
};
