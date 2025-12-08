<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akadem extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "tashkilot_id",
        "region_id",
        "science_id",
        "full_name",
        "photo",
        "project_name",
        "total_amount",
        "receiver_organization_name",
        "receiver_organization_inn",
        "receiver_organization_district",
        "receiver_organization_region",
        "sender_organization_name",
        "sender_organization_inn",
        "sender_organization_district",
        "sender_organization_region",
    ];

    public function akademexpert()
    {
        return $this->hasMany(AkademExpert::class);
    }
}
