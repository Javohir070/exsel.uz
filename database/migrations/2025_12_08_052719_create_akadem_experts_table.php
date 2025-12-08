<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('akadem_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('akadem_id')->constrained()->cascadeOnDelete();

            $table->enum('kalendar_reja_monitoring', [
                'bajarilgan',
                'bajarilmagan',
                'davom_etmoqda'
            ]);
            $table->text('kalendar_reja_monitoring_izox')->nullable();
            $table->enum('dalolatnoma_tuzilgan', [
                'bajarilgan',
                'bajarilmagan',
                'davom_etmoqda'
            ]);
            $table->text('dalolatnoma_tuzilgan_izox')->nullable();
            $table->enum('hisobot_muhokama_qilingan', [
                'bajarilgan',
                'bajarilmagan',
                'davom_etmoqda'
            ]);
            $table->text('hisobot_muhokama_qilingan_izox')->nullable();
            $table->enum('hisobot_agentlikka_taqdim', [
                'bajarilgan',
                'bajarilmagan',
                'davom_etmoqda'
            ]);
            $table->text('hisobot_agentlikka_taqdim_izox')->nullable();

            $table->string('fish');
            $table->string('status');
            $table->integer('quarter')->default(1);
            $table->text('comment');
            $table->string('t_masul');
            $table->string('ekspert_fish');
            $table->enum('holati', ['yuborildi', 'Rad etildi', 'Tasdiqlandi'])->default('yuborildi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akadem_experts');
    }
};
