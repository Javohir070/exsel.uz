<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stajirovkaexpert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stajirovka_id',
        'fish',
        'ekspert_fish',
        't_masul',
        'ilmiy_hisobot',
        'egallangan_bilim',
        'ishlar_natijalari',
        'xalqarotan_jur_nashr',
        'biryil_davomida',
        'status',
        'comment',
        'file',
        'tashkilot_id',
        'holati',
        'quarter',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stajirovkalar()
    {
        return $this->belongsTo(Stajirovka::class, 'stajirovka_id');
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class, 'tashkilot_id');
    }

}
