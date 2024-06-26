<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umumiyyil extends Model
{
    use HasFactory;

    protected $fillable = ['y2017', 'y2018', 'y2019', 'y2020', 'y2021', 'y2022', 'y2023', 'y2024'];
}
