<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asbobuskunaexpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asbobuskuna_id',
        'fish',
        'status',
        'comment',
        'file',
        'lab_uskunalarini_mosligi',
        'ilmiy_tadqiqot_ishilari',
        'ilmiy_tadqiqot_hajmi',
        'lab_zaxirasi',
        'foy_uchun_ariz',
        'asbob_usk_ehtiyoji',
        'zarur_ehtiyoji',
        'lab_ishga_yaroqliligi',
        'tashkilot_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
