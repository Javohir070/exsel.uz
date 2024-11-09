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
        Schema::create('izlanuvchilars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('laboratory_id')->constrained()->cascadeOnDelete();
            $table->string('fish');
            $table->string('jshshir');
            $table->string('pasport_seriya');
            $table->string('jinsi');
            $table->string('talim_turi');
            $table->string('ixtisoslik');
            $table->integer('qabul_qilgan_yil');
            $table->string('mavzusi');
            $table->string('phone');
            $table->string('loyihada_ishtiroki');
            $table->integer('stir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izlanuvchilars');
    }
};
