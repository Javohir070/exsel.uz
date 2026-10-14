<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * xujaliks jadvaliga bazaga qo'lda qo'shilgan ustunlarni migrationga ham qo'shadi
     * va ixtiyoriy intellektual mulk maydonlarini nullable qiladi.
     */
    public function up(): void
    {
        $columns = [
            'laboratory_id' => fn (Blueprint $table) => $table->unsignedBigInteger('laboratory_id')->nullable()->after('tashkilot_id'),
            'kafedralar_id' => fn (Blueprint $table) => $table->unsignedBigInteger('kafedralar_id')->nullable()->after('laboratory_id'),
            'chorak1' => fn (Blueprint $table) => $table->string('chorak1', 256)->nullable(),
            'chorak2' => fn (Blueprint $table) => $table->string('chorak2', 256)->nullable(),
            'chorak3' => fn (Blueprint $table) => $table->string('chorak3', 256)->nullable(),
            'chorak4' => fn (Blueprint $table) => $table->string('chorak4', 256)->nullable(),
            'shartnoma_file' => fn (Blueprint $table) => $table->string('shartnoma_file', 2024)->nullable(),
            'dalolatnoma_file' => fn (Blueprint $table) => $table->string('dalolatnoma_file', 2024)->nullable(),
            'pul_type' => fn (Blueprint $table) => $table->string('pul_type', 256)->nullable(),
            'status' => fn (Blueprint $table) => $table->enum('status', ['Jarayonda', 'Yakunlangan'])->default('Jarayonda'),
        ];

        foreach ($columns as $name => $definition) {
            if (! Schema::hasColumn('xujaliks', $name)) {
                Schema::table('xujaliks', $definition);
            }
        }

        DB::statement('ALTER TABLE xujaliks MODIFY intellektual_raqami VARCHAR(600) NULL');
        DB::statement('ALTER TABLE xujaliks MODIFY intellektual_sana VARCHAR(255) NULL');
    }

    public function down(): void
    {
        // Ustunlar ishlab turgan bazada oldindan mavjud bo'lgani uchun ularni o'chirmaymiz
    }
};
