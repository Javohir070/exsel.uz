<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafedralar extends Model
{
    use HasFactory;
    protected $fillable = ["tashkilot_id", "name", "tash_yil"];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class, "tashkilot_id");
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
