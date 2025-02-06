<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlmiyLoyiha extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'laboratory_id',
        "tashkilot_id",
        "umumiyyil_id",
        "mavzusi",
        "turi",
        "dastyri",
        "q_hamkor_tashkilot",
        "hamkor_davlat",
        "muddat",
        "bosh_sana",
        "tug_sana",
        "pan_yunalish",
        "rahbar_name",
        "raqami",
        "sanasi",
        "sum",
        "umumiy_mablag",
        "olingan_natija",
        "joriy_holati",
        "tijoratlashtirish",

        "rahbariilmiy_darajasi",
        "rahbariilmiy_unvoni",
        "r_lavozimi",
        "hamrahbar_fish",
        "hamr_ishjoyi",
        "hamr_lavozimi",
        "hamr_davlati",
        "joyyilajratilgan_mablag",
        "shtat_birligi",
        "ijrochilar_soni",
        "ortacha_yoshi",
        "moddiy_texnik_mablaglar",
        "jami_summaga_nisbatan",
        "jami_chop_joriyyil",
        "jami_chop_jami",
        "mahalliymaqola_joriyyil",
        "mahalliymaqol_jami",
        "xorijiymaqola_joriyyil",
        "xorijiymaqola_jami",
        "scopus_joriyyil",
        "scopus_jami",
        "tezislar_joriyyil",
        "tezislar_jami",
        "ilmiy_mon_joriyyil",
        "ilmiy_mon_jami",
        "olinganpatent_joriyyil",
        "olinganpatent_jami",
        "patentga_berilgansoni",
        "dasturiy_maxguv_joriyyil",
        "dasturiy_maxguv_jami",
        "hisobot_davrida_natijalar",
        "loyiha_yakunida",
        "ilmiy_ishlanma",
        'mavzusi_ru',
        'ijrochi_tashkilot',
        'savolnoma',
        'malumotnoma',
        'kafedralar_id',
        'status'
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
    protected $casts = [
        'umumiy_mablag' => 'array', // Cast the json column to an array
    ];

    public function umumiyyil()
    {
        return $this->belongsTo(Umumiyyil::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tekshirivchilars()
    {
        return $this->hasOne(Tekshirivchilar::class);
    }

    public function kafedralar()
    {
        return $this->belongsTo(Kafedralar::class);
    }

    // App\Models\IlmiyLoyiha.php

    // public function umumiyyil()
    // {
    //     return $this->belongsTo(Umumiyyil::class, 'umumiyyil_id');
    // }


}
