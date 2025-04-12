<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doktarantura extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    public $incrementing = false; // API dan keladigan id ishlatyapmiz

    protected $fillable = [
        'id',
        "user_id",
        "tashkilot_id",
        "phd_id",
        "full_name",
        "direction_name",
        "direction_code",
        "org_name",
        "dc_type",
        "admission_year",
        "admission_quarter",
        "advisor",
        "course",
        "monitoring_1",
        "monitoring_2",
        "monitoring_3",
        "reja_t",
        "reja_b",
        "monitoring_natijasik",
        "status",
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
}
