<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laboratory::create([
            'tashkilot_id' => '1',
            'name' => "test uchun superadmin",
            'tash_yil' => "2000",
            "tavsif" => "test",
        ]);
    }
}
