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
        Schema::create('yillars', function (Blueprint $table) {
            $table->id();
            $table->string('y2017');
            $table->string('y2018');
            $table->string('y2019');
            $table->string('y2020');
            $table->string('y2021');
            $table->string('y2022');
            $table->string('y2023');
            $table->string('y2024');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yillars');
    }
};
