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
        Schema::create('loyiha_monitoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ilmiy_loyiha_id')
                ->constrained('ilmiy_loyihas')
                ->cascadeOnDelete();

            $table->foreignId('monitoring_id')
                ->constrained('monitorings')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['ilmiy_loyiha_id', 'monitoring_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyiha_monitoring');
    }
};
