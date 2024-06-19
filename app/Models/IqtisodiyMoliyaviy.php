<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IqtisodiyMoliyaviy extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "tashkilot_id", "kadastr_raqami", "u_maydoni", "taj_maydonlari", "binolar_soni", "auditoriya_sigimi", "k_xaj_auditor_soni", "pondi_miqdori", "ilmiyp_bulinalar", "gaz", "elektr", "suv", "kanalizasiya", "internet"];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
