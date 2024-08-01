<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tashkilot extends Model
{
    use HasFactory;

    protected $fillable = ["name","id_raqam","name_qisqachasi","tashkilot_turi", "tash_yil", "yur_manzil", "viloyat","tuman", "paoliyat_manzil", "phone", "email","web_sayti", "turi", "xarajatlar", "shtat_bir","tash_xodimlar", "ilmiy_xodimlar", "boshqariv", "stir_raqami","bank","logo",'hisob_raqam'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function xodimlar()
    {
        return $this->hasMany(Xodimlar::class);
    }

    public function tashkilotrahbaris()
    {
        return $this->hasMany(TashkilotRahbari::class);
    }
    public function ilmiyloyhalar()
    {
        return $this->hasMany(IlmiyLoyiha::class);
    }

    public function xujaliklar()
    {
        return $this->hasMany(Xujalik::class);
    }
    public function ilmiydarajalar()
    {
        return $this->hasMany(IlmiybnTaminlanga::class);
    }

    public function iqtisodiylar()
    {
        return $this->hasMany(IqtisodiyMoliyaviy::class);
    }
}
