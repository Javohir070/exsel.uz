<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilmiytezislar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'kafedralar_id',
        'type',
        'mavzu',
        'mualliflar_json',
        'chopq_sana',
        'kon_full_nomi',
        'kon_qisqa_nomi',
        'soni',
        'nashriyot',
        'annotatsiya',
        'fan_yunalishi',
        'url',
        'doi'
    ];

    // Agar siz JSON maydonini masshtablashni istasangiz, u holda uni quyidagi tarzda ishlating:
    protected $casts = [
        'mualliflar_json' => 'array', // JSON maydonini array sifatida saqlash
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
