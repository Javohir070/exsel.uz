<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestTelegramDirectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:test-direct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Telegram API ni to\'g\'ridan-to\'g\'ri test qilish';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (empty($botToken) || empty($chatId)) {
            $this->error('❌ Telegram sozlamalari to\'liq emas!');
            return Command::FAILURE;
        }

        $this->info('Telegram API ni to\'g\'ridan-to\'g\'ri test qilish...');
        $this->newLine();

        $testMessage = "🧪 <b>Test xabari</b>\n\nBu to'g'ridan-to'g'ri Telegram API testi!\n\nVaqt: " . now()->format('Y-m-d H:i:s');

        try {
            $this->info("Bot Token: " . substr($botToken, 0, 15) . '...');
            $this->info("Chat ID: " . $chatId);
            $this->newLine();

            $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
            
            $this->info("URL: " . $url);
            $this->newLine();

            $this->info('HTTP so\'rov yuborilmoqda...');
            
            $response = Http::timeout(10)
                ->retry(2, 100)
                ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o'chirish
                ->post($url, [
                    'chat_id' => $chatId,
                    'text' => $testMessage,
                    'parse_mode' => 'HTML',
                ]);

            $this->info('HTTP Status: ' . $response->status());
            $this->newLine();

            if ($response->successful()) {
                $responseData = $response->json();
                
                if (isset($responseData['ok']) && $responseData['ok']) {
                    $this->info('✅ Xabar muvaffaqiyatli yuborildi!');
                    $this->line('Message ID: ' . ($responseData['result']['message_id'] ?? 'N/A'));
                    $this->newLine();
                    $this->info('📱 Telegram botingizni tekshiring!');
                } else {
                    $this->error('❌ Telegram API xatolik:');
                    $this->line('Error Code: ' . ($responseData['error_code'] ?? 'N/A'));
                    $this->line('Description: ' . ($responseData['description'] ?? 'N/A'));
                    $this->newLine();
                    $this->warn('Ehtimol:');
                    $this->line('  - Bot token noto\'g\'ri');
                    $this->line('  - Chat ID noto\'g\'ri');
                    $this->line('  - Bot sizga start qilmagan');
                }
            } else {
                $this->error('❌ HTTP xatolik: ' . $response->status());
                $this->line('Response: ' . $response->body());
            }

            $this->newLine();
            $this->line('Full Response:');
            $this->line(json_encode($response->json(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        } catch (\Exception $e) {
            $this->error('❌ Exception: ' . $e->getMessage());
            $this->line('File: ' . $e->getFile() . ':' . $e->getLine());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
