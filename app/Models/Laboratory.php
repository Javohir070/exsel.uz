<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = ["tashkilot_id", "name", "tash_yil", "address"];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
     
    public function xodimlar()
    {
        return $this->belongsTo(Xodimlar::class);
    }
}
