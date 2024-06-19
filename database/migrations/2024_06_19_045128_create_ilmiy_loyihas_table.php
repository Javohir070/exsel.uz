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
        Schema::create('ilmiy_loyihas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->string('mavzusi');
            $table->string('turi');
            $table->string('dastyri');
            $table->string('q_hamkor_tashkilot');
            $table->string('hamkor_davlat');
            $table->string('muddat');
            $table->string('bosh_sana');
            $table->string('tug_sana');
            $table->string('pan_yunalish');
            $table->string('rahbar_name');
            $table->string('raqami');
            $table->string('sanasi');
            $table->string('sum');
            $table->string('umumiy_mablag');
            $table->string('olingan_natija');
            $table->string('joriy_holati');
            $table->string('tijoratlashtirish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilmiy_loyihas');
    }
};
