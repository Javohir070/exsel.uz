<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stajirovka extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'user_id',
        'fish',
        'lavozim',
        'ilmiy_hisobot',
        'egallangan_bilim',
        'ishlar_natijalari',
        'xalqarotan_jur_nashr',
        'biryil_davomida',
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stajirovkaexpert()
    {
        return $this->hasMany(Stajirovkaexpert::class);
    }
}
