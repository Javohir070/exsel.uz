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
        Schema::create('tashkilots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_qisqachasi');
            $table->string('tash_yil');
            $table->string('yur_manzil');
            $table->string('viloyat');
            $table->string('tuman');
            $table->string('paoliyat_manzil');
            $table->string('phone');
            $table->string('email');
            $table->string('web_sayti');
            $table->string('turi');
            $table->string('xarajatlar');
            $table->string('shtat_bir');
            $table->string('tash_xodimlar');
            $table->string('ilmiy_xodimlar');
            $table->string('boshqariv');
            $table->string('stir_raqami');
            $table->string('bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tashkilots');
    }
};
