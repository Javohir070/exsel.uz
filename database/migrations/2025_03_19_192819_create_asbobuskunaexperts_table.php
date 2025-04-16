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
        Schema::create('asbobuskunaexperts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained('tashkilots')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('asbobuskuna_id')->constrained()->onDelete('cascade');
            $table->string('fish');
            $table->string('status');
            $table->text('comment');
            $table->string('file')->nullable();
            $table->string('lab_uskunalarini_mosligi');
            $table->string('ilmiy_tadqiqot_ishilari');
            $table->string('ilmiy_tadqiqot_hajmi');
            $table->string('lab_zaxirasi');
            $table->string('foy_uchun_ariz');
            $table->string('asbob_usk_ehtiyoji');
            $table->string('zarur_ehtiyoji');
            $table->string('lab_ishga_yaroqliligi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asbobuskunaexperts');
    }
};
