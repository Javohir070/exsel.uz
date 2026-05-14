<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ilmiy_loyiha_asbobuskuna')) {
            return;
        }

        Schema::create('ilmiy_loyiha_asbobuskuna', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ilmiy_loyiha_id');
            $table->unsignedBigInteger('asbobuskuna_id');
            $table->timestamps();

            $table->unique(['ilmiy_loyiha_id', 'asbobuskuna_id']);
            $table->index('ilmiy_loyiha_id');
            $table->index('asbobuskuna_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ilmiy_loyiha_asbobuskuna');
    }
};
