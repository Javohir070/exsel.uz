<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monografiyalar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'kafedralar_id',
        'name',
        'nashr_yili',
        'chop_etil_nashriyot',
        'til',
        'fan_yunalishi',
        'asoslovchi_hujjat',
        'kbk',
        'isbn',
        'mualliflar_json', // JSON maydon
    ];

    protected $casts = [
        'mualliflar_json' => 'array', // JSONni arrayga aylantirish
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function kafedralar()
    {
        return $this->belongsTo(Kafedralar::class);
    }
}
