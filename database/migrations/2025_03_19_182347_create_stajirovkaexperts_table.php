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
        Schema::create('stajirovkaexperts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('stajirovka_id')->constrained()->onDelete('cascade');
            $table->string('fish');
            $table->string('status');
            $table->text('comment');
            $table->string('file')->nullable();
            $table->string('ilmiy_hisobot');
            $table->string('egallangan_bilim');
            $table->string('ishlar_natijalari');
            $table->string('xalqarotan_jur_nashr');
            $table->string('biryil_davomida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stajirovkaexperts');
    }
};
