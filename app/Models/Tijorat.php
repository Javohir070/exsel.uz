<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tijorat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tashkilot_id',
        'region_id',
        'name',
        'loyiha_rahbari',
        'ijrochi_tashkilot',
        'summa',
        'tash_summasi',
        'region',
        'turi',
        'yar_ish_urni',
        't_soha',
        'q_soha',
        'm_asosi',
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tijoratexpert()
    {
        return $this->hasMany(TijoratExpert::class);
    }

    /**
     * Summa qiymatini minglik bo‘shliq bilan chiqarish (masalan: 1170000.00 → 1 170 000).
     */
    public static function formatMoneyDisplay(mixed $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }
        $s = str_replace(["\xc2\xa0", ' '], '', (string) $value);
        if ($s === '' || ! is_numeric($s)) {
            return '';
        }

        return number_format((float) $s, 0, ',', ' ');
    }
}
