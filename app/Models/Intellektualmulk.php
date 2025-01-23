<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intellektualmulk extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'kafedralar_id',
        'type',
        'mavzu',
        'nashr_sana',
        'soni',
        'annotatsiya',
        'fan_yunalishi',
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
