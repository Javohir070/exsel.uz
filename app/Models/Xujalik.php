<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xujalik extends Model
{
    use HasFactory;

        
        protected $fillable = ['user_id','laboratory_id', 'tashkilot_id', 'ishlanma_nomi', 'intellektual_raqami', 'intellektual_sana', 'ishlanma_mavzu', 'ishlanma_turi', 'lisenzion', 'sh_raqami', 'sh_sanasi', 'ilmiy_nomi', 'stir', 'sh_summa', 'shkelib_sana', 'shkelib_summa','chorak1','chorak2','chorak3', 'chorak4', 'shartnoma_file', 'dalolatnoma_file', 'pul_type'];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
}
