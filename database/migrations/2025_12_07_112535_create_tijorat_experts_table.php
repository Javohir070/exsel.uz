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
        Schema::create('tijorat_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tashkilot_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tijorat_id')->constrained()->cascadeOnDelete();
            $table->boolean('grant_sarf_maqsadli');
            $table->text('grant_sarf_maqsadli_izox')->nullable();

            // 2
            $table->boolean('asbob_balans_olingan');
            $table->text('asbob_balans_olingan_izox')->nullable();

            // 3
            $table->integer('xodimlar_lozim');
            $table->boolean('xodimlar_haqiqiy');
            $table->text('xodimlar_haqiqiy_izox')->nullable();

            // 4
            $table->string('mahsulot_miqdori');
            $table->string('mahsulot_olchov');

            // 5
            $table->decimal('sotuv_hajmi', 15, 2);

            // 6
            $table->decimal('eksport_hajmi', 15, 2);

            // 7
            $table->decimal('soliq_tolov', 15, 2);

            // 8
            $table->text('hisobot_topshirildi_izox');

            // 9
            $table->boolean('sertifikat_olingan');
            $table->text('sertifikat_olingan_izox')->nullable();

            // 10
            $table->boolean('loyiha_muammo');
            $table->text('loyiha_muammo_izox')->nullable();

            // 11
            $table->boolean('loyiha_taklif');
            $table->text('loyiha_taklif_izox')->nullable();

            // 12
            $table->string('kalendar_bajarilgan');

            // 13
            $table->string('media_zip'); // ZIP fayl path
            $table->string('fish');
            $table->string('status');
            $table->integer('quarter')->default(1);
            $table->text('comment');
            $table->string('t_masul');
            $table->string('ekspert_fish');
            $table->enum('holati', ['yuborildi', 'Rad etildi', 'Tasdiqlandi'])->default('yuborildi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tijorat_experts');
    }
};
