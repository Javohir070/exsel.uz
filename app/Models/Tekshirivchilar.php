<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tekshirivchilar extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','tashkilot_id', 'fish', 'comment', 'file',  'status', 'ilmiy_loyiha_id', 'is_active',
    'kalendar',
    'shart_sharoit_yaratib',
    'yakuniy_natijalar',
    'loyiha_ijrochilari',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ilmiyLoyihalar()
    {
        return $this->belongsTo(IlmiyLoyiha::class, 'ilmiy_loyiha_id');
    }
}
