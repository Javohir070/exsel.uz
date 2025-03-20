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
        Schema::create('asbobuskunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained('tashkilots')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('laboratory_id')->constrained('laboratories')->onDelete('cascade');
            $table->string('name');
            $table->string('model');
            $table->string('turi');
            $table->string('ishlab_davlat');
            $table->year('ishlabchiq_yil');
            $table->decimal('harid_summa', 15, 2);
            $table->decimal('buxgalteriya_summa', 15, 2);
            $table->string('moliya_manbasi');
            $table->string('loy_shifri')->nullable();
            $table->string('sh_raqami')->nullable();
            $table->date('sh_sanasi')->nullable();
            $table->year('harid_qilingan_yil');
            $table->string('holati');
            $table->year('urnatilgan_yili');
            $table->string('fish');
            $table->string('jav_buy_raqami');
            $table->date('jav_sanasi');
            $table->text('ilmiy_tadqiqot_ishilari');
            $table->text('ilmiy_tadqiqot_hajmi');
            $table->text('lab_zaxirasi');
            $table->text('foy_uchun_ariz');
            $table->text('asbob_usk_ehtiyoji');
            $table->text('zarur_ehtiyoji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asbobuskunas');
    }
};
