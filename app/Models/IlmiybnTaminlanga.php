<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlmiybnTaminlanga extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "tashkilot_id", "umumiyyil_id", "yillar_id", "xodimlar_jami", "ilmiy_xodimlar", "name", "turi", "moliyal_jami", "xodimganisbat_jami"];


    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);    
    }
}
