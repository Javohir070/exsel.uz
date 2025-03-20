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
        'status',
        'comment',
        'file',
        'tash_buyruq_mutanosi',
        'ish_rejasi',
        'kurs_kesimi',
        'mud_oldin',
        'ilmiy_rah_birikisoni',
        'hujjatlar_kiritish_holati',
    ];
}
