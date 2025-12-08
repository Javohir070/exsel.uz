<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkademExpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'akadem_id',
        'kalendar_reja_monitoring',
        'kalendar_reja_monitoring_izox',
        'dalolatnoma_tuzilgan',
        'dalolatnoma_tuzilgan_izox',
        'hisobot_muhokama_qilingan',
        'hisobot_muhokama_qilingan_izox',
        'hisobot_agentlikka_taqdim',
        'hisobot_agentlikka_taqdim_izox',
        'fish',
        'status',
        'quarter',
        'comment',
        't_masul',
        'ekspert_fish',
        'holati',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function akadem()
    {
        return $this->belongsTo(Akadem::class);
    }
}
