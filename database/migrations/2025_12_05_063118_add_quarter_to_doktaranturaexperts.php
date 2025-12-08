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
        Schema::table('doktaranturaexperts', function (Blueprint $table) {
            $table->string('quarter')->default(1);
            $table->string('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doktaranturaexperts', function (Blueprint $table) {
            $table->dropColumn('quarter');
            $table->dropColumn('year');
        });
    }
};
