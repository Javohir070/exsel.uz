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
            $table->string('id_raqam');
            $table->string('tashkilot_turi')->nullable();
            $table->string('name_qisqachasi')->nullable();
            $table->string('tash_yil')->nullable();
            $table->string('yur_manzil')->nullable();
            $table->string('viloyat')->nullable();
            $table->string('tuman')->nullable();
            $table->string('paoliyat_manzil')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('web_sayti')->nullable();
            $table->string('turi')->nullable();
            $table->string('xarajatlar')->nullable();
            $table->string('shtat_bir')->nullable();
            $table->string('tash_xodimlar')->nullable();
            $table->string('ilmiy_xodimlar')->nullable();
            $table->string('boshqariv')->nullable();
            $table->string('stir_raqami')->nullable();
            $table->string('bank')->nullable();
            $table->string('logo')->nullable();
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
