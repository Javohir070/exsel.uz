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
        Schema::create('xujaliks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->string('ishlanma_nomi');
            $table->string('intellektual_raqami');
            $table->string('intellektual_sana');
            $table->string('ishlanma_mavzu');
            $table->string('ishlanma_turi');
            $table->string('lisenzion');
            $table->string('sh_raqami');
            $table->string('sh_sanasi');
            $table->string('ilmiy_nomi');
            $table->string('stir');
            $table->string('sh_summa');
            $table->string('shkelib_sana');
            $table->string('shkelib_summa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xujaliks');
    }
};
