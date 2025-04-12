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
        Schema::create('doktaranturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->integer('phd_id');
            $table->string('full_name');
            $table->text('direction_name');
            $table->string('direction_code');
            $table->text('org_name');
            $table->string('dc_type');
            $table->year('admission_year');
            $table->integer('admission_quarter');
            $table->string('advisor');
            $table->integer('course')->nullable();
            $table->string('monitoring_1');
            $table->string('monitoring_2');
            $table->string('monitoring_3');
            $table->string('reja_t')->nullable();
            $table->string('reja_b')->nullable();
            $table->string('monitoring_natijasik')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doktaranturas');
    }
};
