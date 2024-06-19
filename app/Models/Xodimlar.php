<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xodimlar extends Model
{
    use HasFactory;

    protected $fillable = ['tashkilot_id', 'user_id', 'fish', 'jshshir', 'jinsi', 'yil', 'ish_tartibi', "shtat_birligi", 'urindoshlik_asasida', 'pedagoglik', 'lavozimi' , 'malumoti', 'uzbek_panlar_azosi', 'ilmiy_daraja', 'ilmiy_daraja_yil', 'ilmiy_unvoni', 'ilmiy_unvoni_y', 'ixtisosligi', 'phone', 'email'];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
}
