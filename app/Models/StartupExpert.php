<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupExpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'startup_id',
        'loyiha_yolga_qoyilgan',
        'loyiha_yolga_qoyilgan_izox',
        'daromadga_erishilgan',
        'daromadga_erishilgan_izox',
        'inventar_kirim_qilingan',
        'inventar_kirim_qilingan_izox',
        'inventar_joyida_mavjud',
        'inventar_joyida_mavjud_izox',
        'inventar_parametr_mosligi',
        'inventar_parametr_mosligi_izox',
        'xodimlar_soni',
        'amalda_xodim_soni',
        'shartnoma_mavjudligi',
        'shartnoma_mavjudligi_izox',
        'fish',
        'status',
        'comment',
        'holati',
        't_masul',
        'ekspert_fish'
    ];

    protected $casts = [
        'loyiha_yolga_qoyilgan' => 'boolean',
        'daromadga_erishilgan' => 'boolean',
        'inventar_kirim_qilingan' => 'boolean',
        'inventar_joyida_mavjud' => 'boolean',
        'inventar_parametr_mosligi' => 'boolean',
        'shartnoma_mavjudligi' => 'boolean',
        'xodimlar_soni' => 'integer',
        'amalda_xodim_soni' => 'integer',
    ];

    /** 
     *  RELATIONLAR
     */

    // Bu ekspertni yaratgan foydalanuvchi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Ekspert tegishli bo'lgan tashkilot
    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    // Ekspert ko‘rib chiqayotgan startup
    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

}
