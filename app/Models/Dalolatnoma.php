<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dalolatnoma extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'kafedralar_id',
        'name',
        'raqami',
        'joyiye_obyekti',
        'joyiye_maqsadi',
        'joyiye_asos',
        'joyiye_tashkilot',
        'joyiye_tarmoq',
        'asoslovchi_hujjat',
    ];


    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
}
