<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyihaiqtisodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'user_id',
        'ilmiy_loyiha_id',

        'hisobot_davri',
        'hisobot_davri_i',
        'loyihabaj_ishlanma',
        'loyihabaj_ishlanma_i',
        'ilmiy_ishlanmalar',
        'ilmiy_ishlanmalar_i',

        'mehnat_haq_r',
        'mehnat_haq_i',
        'mehnat_haq_a',
        'xizmat_saf_r',
        'xizmat_saf_i',
        'xizmat_saf_a',
        'xarid_xaraja_r',
        'xarid_xaraja_i',
        'xarid_xaraja_a',
        'mat_butlovchi_r',
        'mat_butlovchi_i',
        'mat_butlovchi_a',
        'jalb_etilgan_r',
        'jalb_etilgan_i',
        'jalb_etilgan_a',
        'boshqa_xarajat_r',
        'boshqa_xarajat_i',
        'boshqa_xarajat_a',
        'tashustama_xarajat_r',
        'tashustama_xarajat_i',
        'tashustama_xarajat_a',
        'xarid_qilingan_xarid',
        'xarid_qilingan_i',
        'xarid_s',
        'xarid_r',
        'xarid_sh',
        'yetkb_yuridik_nomi',
        'uzlashtirilishi_summasi',
        'uzlashtirilishi_sum_i',
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function ilmiyloyiha()
    {
        return $this->belongsTo(IlmiyLoyiha::class);
    }
}
