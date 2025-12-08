<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TijoratExpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'tijorat_id',

        'grant_sarf_maqsadli',
         'grant_sarf_maqsadli_izox',
        'asbob_balans_olingan',

         'asbob_balans_olingan_izox',
        'xodimlar_lozim',

        'xodimlar_haqiqiy',
         'xodimlar_haqiqiy_izox',
        'mahsulot_miqdori',
        'mahsulot_olchov',
        'sotuv_hajmi',
        'eksport_hajmi',
        'soliq_tolov',
        'hisobot_topshirildi_izox',
        'sertifikat_olingan',
        'sertifikat_olingan_izox',
        'loyiha_muammo',
        'loyiha_muammo_izox',
        'loyiha_taklif',
        'loyiha_taklif_izox',
        'kalendar_bajarilgan',
        'media_zip',

        'fish',
        'status',
        'comment',
        'holati',
        't_masul',
        'ekspert_fish'
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function tijorat()
    {
        return $this->belongsTo(Tijorat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
