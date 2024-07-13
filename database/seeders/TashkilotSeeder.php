<?php

namespace Database\Seeders;

use App\Models\Tashkilot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TashkilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tashkilot::create([
            'name' => "Ilmiy-texnik axborot markazi",
            'id_raqam' => 1,
            'yur_manzil' => "Toshkent 100084, Amir Temur shox ko‘chasi 108 uy",
            "web_sayti" => 'tuit.uz',
            "phone" => "+99894 123 45 67",
            "name_qisqachasi" => "TUIT",
            "tash_yil" => "TUIT",
            "viloyat" => "TUIT",
            "tuman" => "TUIT",
            "paoliyat_manzil" => "TUIT",
            "email" => "TUIT",
            "turi" => "TUIT",
            "xarajatlar" => "TUIT",
            "shtat_bir" => "TUIT",
            "tash_xodimlar" => "TUIT",
            "ilmiy_xodimlar" => "TUIT",
            "boshqariv" => "TUIT",
            "stir_raqami" => "TUIT",
            "bank" => "TUIT",
            "logo"=>"logo.phg",
        ]);

        Tashkilot::create([
            'name' => "O'zMU",
            'id_raqam' => 123654789,
            'yur_manzil' => "Тошкент шаҳар, Университет кўчаси, 4 уй, Universitet Ko'chasi 4, 100174, Тоshkent",
            "web_sayti" => 'nuu.uz',
            "phone" => "+99871 246 54 17",
            "name_qisqachasi" => "O'zMU",
            "tash_yil" => "O'zMU",
            "viloyat" => "O'zMU",
            "tuman" => "O'zMU",
            "paoliyat_manzil" => "O'zMU",
            "email" => "O'zMU",
            "turi" => "O'zMU",
            "xarajatlar" => "O'zMU",
            "shtat_bir" => "O'zMU",
            "tash_xodimlar" => "O'zMU",
            "ilmiy_xodimlar" => "O'zMU",
            "boshqariv" => "O'zMU",
            "stir_raqami" => "O'zMU",
            "bank" => "O'zMU",
            "logo"=>"logo.phg",
        ]);

       
    }
}
