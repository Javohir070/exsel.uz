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
        Schema::table('asbobuskunaexperts', function (Blueprint $table) {
            $table->integer('quarter')->default(1);
            $table->integer('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asbobuskunaexperts', function (Blueprint $table) {
            $table->dropColumn('quarter');
            $table->dropColumn('year');
        });
    }
};
