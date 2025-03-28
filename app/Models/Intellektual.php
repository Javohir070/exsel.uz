<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intellektual extends Model
{
    use HasFactory;

    protected $fillable = [
        'ilmiy_loyiha_id', 'tashkilot_id', 'user_id', 'mal_jur_reja', 'mal_jur_izoh', 'mal_jur_amalda',
        'xor_jur_reja', 'xor_jur_izoh', 'xor_jur_amalda', 'web_jur_reja', 'web_jur_izoh', 'web_jur_amalda',
        'tezislar_reja', 'tezislar_izoh', 'tezislar_amalda', 'ilmiy_mon_reja', 'ilmiy_mon_izoh', 'ilmiy_mon_amalda',
        'darslik_reja', 'darslik_izoh', 'darslik_amalda', 'b_bitiruv_mreja', 'b_bitiruv_izoh', 'b_bitiruv_mamalda',
        'm_bitiruv_dreja', 'm_bitiruv_izoh', 'm_bitiruv_damalda', 'p_bitiruv_dreja', 'p_bitiruv_izoh', 'p_bitiruv_damalda',
        'i_mulk_areja', 'i_mulk_izoh', 'i_mulk_aamalda', 'ixtiro_olingan_psreja', 'ixtiro_olingan_izoh', 'ixtiro_olingan_psamalda',
        'ixtiro_ber_psreja', 'ixtiro_ber_izoh', 'ixtiro_ber_psamalda', 'dasturiy_gsreja', 'dasturiy_izoh', 'dasturiy_gsamalda',
    ];

    public function ilmiyloyiha()
    {
        return $this->belongsTo(IlmiyLoyiha::class);
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
}
