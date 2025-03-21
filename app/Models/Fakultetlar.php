<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultetlar extends Model
{
    use HasFactory;
    protected $fillable = ["tashkilot_id", "name", "tash_yil"];

    public function tashkilot(){
        return $this->belongsTo(Tashkilot::class);
    }
}
