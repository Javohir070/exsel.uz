<?php

namespace App\Console\Commands;

use App\Models\Monitoring;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Tashkilot;
use App\Models\Doktarantura;

class ImportDoktaranturaData extends Command
{

    protected $signature = 'import:doktarantura';
    protected $description = 'Tashkilotlar bo\'yicha API dan doktorantura ma\'lumotlarini import qilish';

    public function handle()
    {
        $tashkilotlar = Tashkilot::where('doktarantura_is', 1)->get();
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');

        foreach ($tashkilotlar as $tashkilot) {
            $stir = $tashkilot->stir_raqami;
            $url = "https://api-daraja.ilmiy.uz/api-monitoring/org-doctorate-list/{$stir}/";

            $this->info("🔄 {$tashkilot->nomi} ({$stir}) tashkilot uchun ma'lumotlar yuklanmoqda...");

            do {
                $response = Http::retry(3, 5000)
                    ->timeout(120)
                    ->withBasicAuth($sms_username, $sms_password)
                    ->withOptions(["verify" => false])
                    ->get($url);

                if ($response->failed()) {
                    $this->error("❌ Xatolik: " . $response->status() . " | STIR: " . $stir);
                    Log::error("Doktarantura API xatolik: " . $response->status() . " | URL: " . $url);
                    break; // bu tashkilotni o‘tkazib yuboramiz
                }

                $data = $response->json();

                if (isset($data['results'])) {
                    foreach ($data['results'] as $item) {
                        Doktarantura::updateOrCreate(
                            [
                                'dok_id' => $item['id'],
                                'quarter' => 4
                            ],
                            [
                                "dok_id" => $item['id'],
                                "user_id" => 1, // auth() ishlamaydi artisan komandada
                                "tashkilot_id" => $tashkilot->id,
                                'full_name' => $item['full_name'],
                                'direction_name' => $item['direction_name'],
                                'direction_code' => $item['direction_code'],
                                'org_name' => $item['org_name'],
                                'dc_type' => $item['dc_type'],
                                'admission_year' => $item['admission_year'],
                                'admission_quarter' => $item['admission_quarter'],
                                'advisor' => $item['advisor'] ?? null,
                                'course' => $item['course'],
                                'monitoring_1' => $item['monitoring_1'],
                                'monitoring_2' => $item['monitoring_2'],
                                'monitoring_3' => $item['monitoring_3'],
                                'quarter' => $this->monitoring->id,
                            ]
                        );
                    }
                }

                $url = $data['next'] ?? null;

                // ixtiyoriy: API haddan tashqari chaqirilmasligi uchun kutish
                sleep(1);

            } while ($url);
        }

        $this->info('✅ Barcha ma\'lumotlar muvaffaqiyatli import qilindi!');
    }
}
