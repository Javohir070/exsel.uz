<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilmiyrahbarlar extends Model
{
    use HasFactory;


    protected $fillable = [
        "id",
        "user_id",
        "tashkilot_id",
        "full_name",
        "org",
        "all",
        "kollegial_organ_qarori",
        "meyoridan_ortiq",
        "tash_meyoridan_ortiq",
        "status",
    ] ;
}
