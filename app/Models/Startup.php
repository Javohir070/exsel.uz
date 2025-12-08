<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'region_id',
        'district_id',
        'name',
        'loyiha_rahbari',
        'inn',
        'ijrochi_tashkilot',
        'sh_summa',
        'uz_mablaglari_hisobidan',
        'umumiy_qiymati',
        'phone',
        'sh_raqami',
        'sh_sanasi',
        'bajarish_muddati',
        'soha',
        'tuman',
        'yangi_ish_urni',
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function startupexpert()
    {
        return $this->hasOne(StartupExpert::class);
    }

}
