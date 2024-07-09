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
        Schema::create('umumiyyils', function (Blueprint $table) {
            $table->id();
            $table->string('y2017')->nullable();
            $table->string('y2018')->nullable();
            $table->string('y2019')->nullable();
            $table->string('y2020')->nullable();
            $table->string('y2021')->nullable();
            $table->string('y2022')->nullable();
            $table->string('y2023')->nullable()->default(0);
            $table->string('y2024')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umumiyyils');
    }
};
