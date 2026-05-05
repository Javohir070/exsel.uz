<?php

namespace App\Models;

use App\Enums\Quarter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'quarter',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'quarter' => Quarter::class,
    ];

    public static function getActive()
    {
        return self::where('is_active', 1)->latest()->first();
    }

    public function ilmiyloyihas()
    {
        return $this->belongsToMany(IlmiyLoyiha::class, 'loyiha_monitoring', 'monitoring_id', 'ilmiy_loyiha_id')
            ->withTimestamps();
    }
}
