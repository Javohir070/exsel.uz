<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyihaijrochilar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tashkilot_id','ilmiy_loyiha_id','fio','science_id','shtat_birligi','jshshir'];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ilmiy_loyiha()
    {
        return $this->belongsTo(IlmiyLoyiha::class);
    }
}
