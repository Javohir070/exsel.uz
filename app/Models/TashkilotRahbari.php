<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TashkilotRahbari extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tashkilot_id', 'fish', 'email', 'phone', 'u_fish', 'u_email', 'u_phone'];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
