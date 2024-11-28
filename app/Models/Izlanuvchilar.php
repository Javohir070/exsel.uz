<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izlanuvchilar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','tashkilot_id', 'is_active', 'status', 'laboratory_id','fish','jshshir', 'jinsi', 'pasport_seriya','talim_turi','ixtisoslik', 'qabul_qilgan_yil', 'mavzusi', 'phone', 'loyihada_ishtiroki', 'stir', 'izlanuvchilars'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    
    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
}
