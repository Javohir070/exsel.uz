<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tashkilot extends Model
{
    use HasFactory;

    protected $fillable = ["name","id_raqam", 'region_id',"name_qisqachasi","tashkilot_turi", "tash_yil", "yur_manzil", "viloyat","tuman", "paoliyat_manzil", "phone", "email","web_sayti", "turi", "xarajatlar", "shtat_bir","tash_xodimlar", "ilmiy_xodimlar", "boshqariv", "stir_raqami","bank","logo",'hisob_raqam'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
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

    public function izlanuvchilar()
    {
        return $this->hasMany(Izlanuvchilar::class);
    }

    public function stajirovkalar()
    {
        return $this->hasMany(Stajirovka::class);
    }

    public function asbobuskunalar()
    {
        return $this->hasMany(Asbobuskuna::class);
    }

    public function laboratorys()
    {
        return $this->hasMany(Laboratory::class);
    }

    public function fakultetlar()
    {
        return $this->hasMany(Fakultetlar::class);
    }

    public function kafedralar()
    {
        return $this->hasMany(Kafedralar::class);
    }
}
