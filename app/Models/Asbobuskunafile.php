<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asbobuskunafile extends Model
{
    use HasFactory;

    protected $fillable = [ 'tashkilot_id', 'user_id', 'file', 'status'];


    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
