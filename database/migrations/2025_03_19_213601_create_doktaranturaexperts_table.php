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
        Schema::create('doktaranturaexperts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tashkilot_id')->constrained()->onDelete('cascade');
            $table->string('fish');
            $table->string('status');
            $table->text('comment');
            $table->string('file')->nullable();
            $table->string('tash_buyruq_mutanosi');
            $table->string('ish_rejasi');
            $table->string('kurs_kesimi');
            $table->string('mud_oldin');
            $table->string('ilmiy_rah_birikisoni');
            $table->string('hujjatlar_kiritish_holati');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doktaranturaexperts');
    }
};
