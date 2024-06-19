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
            'name' => "Tatu",
            'address' => "Toshkent 100084, Amir Temur shox ko‘chasi 108 uy",
            "web_sayti" => 'tuit.uz',
            "phone" => "+99894 123 45 67"
        ]);

        Tashkilot::create([
            'name' => "O'zMU",
            'address' => "Тошкент шаҳар, Университет кўчаси, 4 уй, Universitet Ko'chasi 4, 100174, Тоshkent",
            "web_sayti" => 'nuu.uz',
            "phone" => "+99871 246 54 17"
        ]);

       
    }
}
