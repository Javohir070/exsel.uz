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
        Schema::create('stajirovka_monitoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stajirovka_id')->constrained('stajirovkas')->onDelete('cascade');
            $table->foreignId('monitoring_id')->constrained('monitorings')->onDelete('cascade');
            $table->unique(['stajirovka_id', 'monitoring_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stajirovka_monitoring');
    }
};
