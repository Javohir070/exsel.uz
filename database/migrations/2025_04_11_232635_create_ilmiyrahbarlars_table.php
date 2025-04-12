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
        Schema::create('ilmiyrahbarlars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->integer('org');
            $table->integer('all');
            $table->string('kollegial_organ_qarori')->nullable();
            $table->string('meyoridan_ortiq')->nullable();
            $table->string('tash_meyoridan_ortiq')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilmiyrahbarlars');
    }
};
