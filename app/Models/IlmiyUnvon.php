<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IlmiyUnvon extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ilmiy_unvon_nomi', 'sana', 'regis_raqami', 'kim_tom_berilgan'];

}
