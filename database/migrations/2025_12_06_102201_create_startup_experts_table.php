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
        Schema::create('startup_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tashkilot_id')->constrained()->onDelete('cascade');
            $table->foreignId('startup_id')->constrained()->onDelete('cascade');
            $table->boolean('loyiha_yolga_qoyilgan')->default(0);
            $table->text('loyiha_yolga_qoyilgan_izox')->nullable();
            $table->boolean('daromadga_erishilgan')->default(0);
            $table->text('daromadga_erishilgan_izox')->nullable();
            $table->boolean('inventar_kirim_qilingan')->default(0);
            $table->text('inventar_kirim_qilingan_izox')->nullable();
            $table->boolean('inventar_joyida_mavjud')->default(0);
            $table->text('inventar_joyida_mavjud_izox')->nullable();
            $table->boolean('inventar_parametr_mosligi')->default(0);
            $table->text('inventar_parametr_mosligi_izox')->nullable();
            $table->integer('xodimlar_soni')->default(0);
            $table->integer('amalda_xodim_soni')->default(0);
            $table->boolean('shartnoma_mavjudligi')->default(0);
            $table->text('shartnoma_mavjudligi_izox')->nullable();
            $table->string('fish');
            $table->string('status');
            $table->integer('quarter')->default(1);
            $table->text('comment');
            $table->string('t_masul');
            $table->string('ekspert_fish');
            $table->enum('holati',['yuborildi', 'Rad etildi', 'Tasdiqlandi'])->default('yuborildi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('startup_experts');
    }
};
