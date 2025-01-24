<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xodimlar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tashkilot_id',
        'kafedralar_id',
        'user_id',
        'fish',
        'jshshir',
        'jinsi',
        'yil',
        'ish_tartibi',
        "shtat_birligi",
        'urindoshlik_asasida',
        'pedagoglik',
        'lavozimi' ,
        'malumoti',
        'uzbek_panlar_azosi',
        'ilmiy_daraja',
        'ilmiy_daraja_yil',
        'ilmiy_unvoni',
        'ilmiy_unvoni_y',
        'ixtisosligi',
        'phone',
        'email',
        'seriya_nomer',
        'nskz_kodi',
        'staj',
        'mehnat_shartn_sana',
        'mehnat_shartn_raqami',
        'qabulq_buyurt_sanasi',
        'qabulq_buyurt_raqami',
        'shartnoma_turi',
        'laboratory_id',
        'scopusda_url',
        'webOfscien_url',
        'hirsh_indek',
    ];

    public function tashkilot()
    {
        return $this->belongsTo(Tashkilot::class);
    }
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = $this->formatPhone($value);
    }
    public function getPhoneAttribute($value)
    {
        return $this->formatPhone($value);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function kafedralar()
    {
        return $this->belongsTo(Kafedralar::class);
    }
    private function formatPhone($phone)
    {
        // Faqat raqamlarni olib qolish
        $phone = preg_replace('/\D/', '', $phone);

        // Telefon raqamlarini +998 XX XXX XX XX formatiga keltirish
        if (strlen($phone) == 9) {
            return '+998 ' . substr($phone, 0, 2) . ' ' . substr($phone, 2, 3) . ' ' . substr($phone, 5, 2) . ' ' . substr($phone, 7, 2);
        } elseif (strlen($phone) == 12 && substr($phone, 0, 3) == '998') {
            return '+' . substr($phone, 0, 3) . ' ' . substr($phone, 3, 2) . ' ' . substr($phone, 5, 3) . ' ' . substr($phone, 8, 2) . ' ' . substr($phone, 10, 2);
        } else {
            return '+998 ' . substr($phone, 0, 2) . ' ' . substr($phone, 2, 3) . ' ' . substr($phone, 5, 2) . ' ' . substr($phone, 7, 2);
        }
    }
}
