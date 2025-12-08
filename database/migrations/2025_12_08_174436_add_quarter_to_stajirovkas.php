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
        Schema::table('stajirovkas', function (Blueprint $table) {
            $table->string('ilmiy_hisobot_2');
            $table->string('egallangan_bilim_2');
            $table->string('ishlar_natijalari_2');
            $table->string('xalqarotan_jur_nashr_2');
            $table->string('biryil_davomida_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stajirovkas', function (Blueprint $table) {
            $table->dropColumn('ilmiy_hisobot_2');
            $table->dropColumn('egallangan_bilim_2');
            $table->dropColumn('ishlar_natijalari_2');
            $table->dropColumn('xalqarotan_jur_nashr_2');
            $table->dropColumn('biryil_davomida_2');
        });
    }
};
