<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doktaranturaexpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'fish',
        'ekspert_fish',
        't_masul',
        'status',
        'comment',
        'file',
        "umumiy_izlanuvchilar",
        "yagonae_tah_soni",
        "chetlash_soni",
        "akademik_soni",
        "muddatidano_soni",
        "kiritilmagan_soni",
        "rejani_bajarmagan",
        "mon_nat_kiritilmagan",
        "biriktirilgan_rahbarlar",
        "kollegial_rahbarlar",
        "meyoridan_rahbarlar",
        "tash_ortiq_rahbarlar",
        'holati',
        'quarter',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
}
