<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafedralar extends Model
{
    use HasFactory;
    protected $fillable = ["tashkilot_id", "fakultetlar_id","name", "tash_yil"];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function xodimlar()
    {
        return $this->hasMany(Xodimlar::class);
    }
    public function xujaliklar()
    {
       return $this->hasMany(Xujalik::class);
    }

    public function ilmiyLoyihalar()
    {
       return $this->hasMany(IlmiyLoyiha::class);
    }

    public function izlanuvchilar()
    {
       return $this->hasMany(Izlanuvchilar::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
