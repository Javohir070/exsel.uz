<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('doktaranturas', function (Blueprint $table) {
            $table->enum('himoya_holati', [
                [
                    'himoya_qilgan',
                    'himoyaga_qabul_qilingan',
                    'seminardan_otgan',
                    'tashkilot_muhokamasidan_otgan',
                    'tayyor_emas',
                ]
            ])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doktaranturas', function (Blueprint $table) {
            $table->dropColumn('himoya_holati');
        });
    }
};
