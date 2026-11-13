<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Uzun qiymatlar sig'magani uchun "Data too long" xatosi chiqayotgan ustunlarni kengaytiradi:
     * - ilmiytezislars.kon_full_nomi: varchar(255) -> TEXT (ikki tilli konferensiya nomlari 255 dan oshadi)
     * - asbobuskunas.invertar_r: varchar(220) -> TEXT (bir nechta inventar raqami vergul bilan kiritiladi)
     *
     * invertar_r ustuni bazaga qo'lda qo'shilgan va hech bir migrationda yo'q,
     * shuning uchun u mavjud bo'lmasa qo'shiladi.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE ilmiytezislars MODIFY kon_full_nomi TEXT NOT NULL');

        if (Schema::hasColumn('asbobuskunas', 'invertar_r')) {
            DB::statement('ALTER TABLE asbobuskunas MODIFY invertar_r TEXT NULL');
        } else {
            Schema::table('asbobuskunas', function (Blueprint $table) {
                $table->text('invertar_r')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Uzun qiymatlar saqlangan bo'lsa, strict rejimda bu so'rovlar xato beradi (ma'lumot jim kesilmaydi).
        DB::statement('ALTER TABLE ilmiytezislars MODIFY kon_full_nomi VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE asbobuskunas MODIFY invertar_r VARCHAR(220) NULL');
    }
};
