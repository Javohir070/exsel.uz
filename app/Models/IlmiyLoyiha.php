<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlmiyLoyiha extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", 'laboratory_id', "tashkilot_id", "umumiyyil_id", "mavzusi", "turi", "dastyri", "q_hamkor_tashkilot", "hamkor_davlat", "muddat", "bosh_sana", "tug_sana", "pan_yunalish", "rahbar_name", "raqami", "sanasi", "sum", "umumiy_mablag", "olingan_natija", "joriy_holati", "tijoratlashtirish"];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
    protected $casts = [
        'umumiy_mablag' => 'array', // Cast the json column to an array
    ];

    public function umumiyyil()
    {
        return $this->belongsTo(Umumiyyil::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
    // App\Models\IlmiyLoyiha.php

    // public function umumiyyil()
    // {
    //     return $this->belongsTo(Umumiyyil::class, 'umumiyyil_id');
    // }


}
