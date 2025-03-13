<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asbobuskuna extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id', 'user_id', 'laboratory_id', 'kafedralar_id', 'name', 'model', 'turi',
        'ishlab_davlat', 'ishlabchiq_yil', 'harid_summa', 'buxgalteriya_summa',
        'moliya_manbasi', 'loy_shifri', 'sh_raqami', 'sh_sanasi', 'harid_qilingan_yil',
        'holati', 'urnatilgan_yili', 'fish', 'jav_buy_raqami', 'jav_sanasi'
    ];

    // Aloqalar
    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function kafedralar()
    {
        return $this->belongsTo(Kafedralar::class);
    }
}
