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
        Schema::create('loyihaiqtisodis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ilmiy_loyiha_id')->constrained('ilmiy_loyihas')->cascadeOnDelete();
            $table->text('hisobot_davri');
            $table->text('loyihabaj_ishlanma');
            $table->text('hisobot_davri_i')->nullable();
            $table->text('ilmiy_ishlanmalar');
            $table->text('loyihabaj_ishlanma_i')->nullable();

            $table->text('ilmiy_ishlanmalar_i')->nullable();
            $table->string('mehnat_haq_r');
            $table->string('mehnat_haq_a');
            $table->text('mehnat_haq_i')->nullable();
            $table->string('xizmat_saf_r');
            $table->string('xizmat_saf_a');
            $table->text('xizmat_saf_i')->nullable();
            $table->string('xarid_xaraja_r');
            $table->string('xarid_xaraja_a');
            $table->text('xarid_xaraja_i')->nullable();
            $table->string('mat_butlovchi_r');
            $table->string('mat_butlovchi_a');
            $table->text('mat_butlovchi_i')->nullable();
            $table->string('jalb_etilgan_r');
            $table->string('jalb_etilgan_a');
            $table->text('jalb_etilgan_i')->nullable();
            $table->string('boshqa_xarajat_r');
            $table->string('boshqa_xarajat_a');
            $table->text('boshqa_xarajat_i')->nullable();
            $table->string('tashustama_xarajat_r');
            $table->string('tashustama_xarajat_a');
            $table->text('tashustama_xarajat_i')->nullable();

            $table->string('xarid_qilingan_xarid');
            $table->string('xarid_qilingan_i')->nullable();
            $table->string('xarid_sh')->nullable();
            $table->string('xarid_r')->nullable();
            $table->string('xarid_s')->nullable();
            $table->string('yetkb_yuridik_nomi')->nullable();
            $table->string('uzlashtirilishi_summasi');
            $table->string('uzlashtirilishi_sum_i')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyihaiqtisodis');
    }
};
