<?php

namespace App\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Illuminate\Support\Facades\Http;

class TelegramHandler extends AbstractProcessingHandler
{
    protected string $botToken;
    protected string $chatId;

    public function __construct($level = \Monolog\Level::Error, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        
        $this->botToken = config('services.telegram.bot_token', env('TELEGRAM_BOT_TOKEN'));
        $this->chatId = config('services.telegram.chat_id', env('TELEGRAM_CHAT_ID'));
    }

    protected function write(LogRecord $record): void
    {
        if (empty($this->botToken) || empty($this->chatId)) {
            return;
        }

        $message = $this->formatMessage($record);

        try {
            $response = Http::timeout(10)
                ->retry(2, 100)
                ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o'chirish
                ->post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
                    'chat_id' => $this->chatId,
                    'text' => $message,
                    'parse_mode' => 'HTML',
                ]);

            // Response ni tekshirish
            if ($response->failed()) {
                // Xatolikni log fayliga yozish (recursion oldini olish uchun oddiy log)
                error_log("Telegram xabar yuborishda xatolik: " . $response->body());
                return;
            }

            // Agar response muvaffaqiyatli bo'lmasa
            $responseData = $response->json();
            if (isset($responseData['ok']) && !$responseData['ok']) {
                error_log("Telegram API xatolik: " . ($responseData['description'] ?? 'Noma\'lum xatolik'));
            }
        } catch (\Exception $e) {
            // Silent fail - don't throw exceptions from logger
            error_log("Telegram handler exception: " . $e->getMessage());
        }
    }

    protected function formatMessage(LogRecord $record): string
    {
        $level = strtoupper($record->level->getName());
        $message = $record->message;
        $context = $record->context;
        $extra = $record->extra;

        $formatted = "<b>🚨 Xatolik: {$level}</b>\n\n";
        $formatted .= "<b>Xabar:</b> " . htmlspecialchars($message) . "\n\n";

        // Request ma'lumotlari
        if (isset($context['type'])) {
            $formatted .= "<b>Tur:</b> " . htmlspecialchars($context['type']) . "\n";
            
            if ($context['type'] === 'HTTP') {
                if (isset($context['url'])) {
                    $formatted .= "<b>URL:</b> " . htmlspecialchars($context['url']) . "\n";
                }
                if (isset($context['method'])) {
                    $formatted .= "<b>Method:</b> " . htmlspecialchars($context['method']) . "\n";
                }
                if (isset($context['ip'])) {
                    $formatted .= "<b>IP:</b> " . htmlspecialchars($context['ip']) . "\n";
                }
                if (isset($context['user_id'])) {
                    $formatted .= "<b>Foydalanuvchi ID:</b> " . htmlspecialchars((string)$context['user_id']) . "\n";
                }
                if (isset($context['user_name'])) {
                    $formatted .= "<b>Foydalanuvchi:</b> " . htmlspecialchars($context['user_name']) . "\n";
                }
            } elseif ($context['type'] === 'Console' && isset($context['command'])) {
                $command = is_array($context['command']) ? implode(' ', $context['command']) : $context['command'];
                $formatted .= "<b>Buyruq:</b> " . htmlspecialchars($command) . "\n";
            }
            $formatted .= "\n";
        }

        // Exception ma'lumotlari
        if (isset($context['exception']) && $context['exception'] instanceof \Throwable) {
            $exception = $context['exception'];
            $formatted .= "<b>Exception:</b> " . htmlspecialchars(get_class($exception)) . "\n";
            $formatted .= "<b>Fayl:</b> " . htmlspecialchars($exception->getFile()) . ":" . $exception->getLine() . "\n";
            
            if ($exception->getMessage()) {
                $formatted .= "<b>Xatolik matni:</b> " . htmlspecialchars($exception->getMessage()) . "\n";
            }
            
            $trace = $exception->getTraceAsString();
            if (strlen($trace) > 1000) {
                $trace = substr($trace, 0, 1000) . '...';
            }
            $formatted .= "\n<b>Trace:</b>\n<code>" . htmlspecialchars($trace) . "</code>\n";
        }

        // Qo'shimcha kontekst ma'lumotlari
        $skipKeys = ['exception', 'type', 'url', 'method', 'ip', 'user_id', 'user_name', 'command', 'user_agent', 'request_data'];
        $otherContext = array_diff_key($context, array_flip($skipKeys));
        
        if (!empty($otherContext)) {
            $formatted .= "\n<b>Qo'shimcha ma'lumotlar:</b>\n";
            foreach ($otherContext as $key => $value) {
                if (is_string($value) || is_numeric($value)) {
                    $formatted .= "• <b>" . htmlspecialchars($key) . ":</b> " . htmlspecialchars((string)$value) . "\n";
                } elseif (is_array($value)) {
                    $jsonValue = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                    if (strlen($jsonValue) > 200) {
                        $jsonValue = substr($jsonValue, 0, 200) . '...';
                    }
                    $formatted .= "• <b>" . htmlspecialchars($key) . ":</b> " . htmlspecialchars($jsonValue) . "\n";
                }
            }
        }

        // Request data (faqat muhim qismlari)
        if (isset($context['request_data']) && is_array($context['request_data']) && !empty($context['request_data'])) {
            $formatted .= "\n<b>Request Data:</b>\n";
            $requestData = array_slice($context['request_data'], 0, 5); // Faqat birinchi 5 ta
            foreach ($requestData as $key => $value) {
                $displayValue = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string)$value;
                if (strlen($displayValue) > 100) {
                    $displayValue = substr($displayValue, 0, 100) . '...';
                }
                $formatted .= "• <b>" . htmlspecialchars($key) . ":</b> " . htmlspecialchars($displayValue) . "\n";
            }
            if (count($context['request_data']) > 5) {
                $formatted .= "... va yana " . (count($context['request_data']) - 5) . " ta parametr\n";
            }
        }

        $formatted .= "\n<b>Vaqt:</b> " . $record->datetime->format('Y-m-d H:i:s') . "\n";
        $formatted .= "<b>Environment:</b> " . htmlspecialchars(app()->environment());

        // Telegram xabar uzunligi 4096 belgidan oshmasligi kerak
        if (strlen($formatted) > 4096) {
            $formatted = substr($formatted, 0, 4000) . "\n\n... (xabar qisqartirildi)";
        }

        return $formatted;
    }
}
