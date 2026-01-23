<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Exception;

class TestTelegramCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:test {--exception : Exception bilan test qilish}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Telegram logging tizimini test qilish';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Telegram logging tizimini test qilish boshlandi...');
        $this->newLine();

        // Bot token va Chat ID ni tekshirish
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (empty($botToken) || empty($chatId)) {
            $this->error('❌ Telegram sozlamalari to\'liq emas!');
            $this->warn('Iltimos, .env faylida quyidagilarni to\'ldiring:');
            $this->line('  TELEGRAM_BOT_TOKEN=your_bot_token');
            $this->line('  TELEGRAM_CHAT_ID=your_chat_id');
            return Command::FAILURE;
        }

        $this->info('✅ Telegram sozlamalari topildi');
        $this->line("  Bot Token: " . substr($botToken, 0, 10) . '...');
        $this->line("  Chat ID: " . $chatId);
        $this->newLine();

        if ($this->option('exception')) {
            // Exception testi
            $this->info('Exception testi boshlandi...');
            try {
                throw new Exception('Bu test exception xatoligi! Console command orqali yuborilmoqda.');
            } catch (Exception $e) {
                // Exception Handler avtomatik ravishda Telegramga yuboradi
                $this->info('✅ Exception yaratildi va Telegramga yuborildi!');
            }
        } else {
            // Oddiy logging testi
            $this->info('Logging testi boshlandi...');
            
            Log::channel('telegram')->error('Bu test xatolik xabari! Console command orqali yuborilmoqda.', [
                'test' => true,
                'type' => 'Console',
                'command' => 'telegram:test',
            ]);

            $this->info('✅ Xatolik Telegramga yuborildi!');
        }

        $this->newLine();
        $this->info('📱 Telegram botingizni tekshiring - xabar kelgan bo\'lishi kerak!');
        
        return Command::SUCCESS;
    }
}
