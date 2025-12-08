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
        Schema::create('stajirovkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tashkilot_id')->constrained('tashkilots')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fish');
            $table->string('lavozim');

            $table->string('ilmiy_hisobot');
            $table->string('egallangan_bilim');
            $table->string('ishlar_natijalari');
            $table->string('xalqarotan_jur_nashr');
            $table->string('biryil_davomida');
            $table->string('quarter');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stajirovkas');
    }
};
