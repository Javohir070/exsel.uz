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
            $table->string('umumiy_izlanuvchilar');
            $table->string('yagonae_tah_soni');
            $table->string('chetlash_soni');
            $table->string('akademik_soni');
            $table->string('muddatidano_soni');
            $table->string('kiritilmagan_soni');
            $table->string('rejani_bajarmagan');
            $table->string('mon_nat_kiritilmagan');
            $table->string('biriktirilgan_rahbarlar');
            $table->string('kollegial_rahbarlar');
            $table->string('meyoridan_rahbarlar');
            $table->string('tash_ortiq_rahbarlar');
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
