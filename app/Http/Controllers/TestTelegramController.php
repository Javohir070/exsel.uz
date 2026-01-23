<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class TestTelegramController extends Controller
{
    /**
     * Telegram logging ni test qilish
     */
    public function test()
    {
        try {
            // Oddiy xatolik testi
            Log::channel('telegram')->error('Bu test xatolik xabari!', [
                'test' => true,
                'type' => 'HTTP',
                'url' => request()->fullUrl(),
                'method' => request()->method(),
                'ip' => request()->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Test xatolik Telegramga yuborildi! Telegram botingizni tekshiring.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xatolik: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Exception bilan test qilish
     */
    public function testException()
    {
        try {
            // Exception yaratish va yuborish
            throw new Exception('Bu test exception xatoligi! Bu xatolik Telegramga yuborilishi kerak.');
        } catch (Exception $e) {
            // Exception Handler avtomatik ravishda Telegramga yuboradi
            return response()->json([
                'success' => true,
                'message' => 'Test exception yaratildi va Telegramga yuborildi! Telegram botingizni tekshiring.'
            ]);
        }
    }

    /**
     * Turli xil darajadagi xatoliklarni test qilish
     */
    public function testLevels()
    {
        try {
            Log::channel('telegram')->emergency('Emergency darajadagi xatolik!', [
                'level' => 'emergency',
                'type' => 'HTTP',
            ]);

            Log::channel('telegram')->critical('Critical darajadagi xatolik!', [
                'level' => 'critical',
                'type' => 'HTTP',
            ]);

            Log::channel('telegram')->error('Error darajadagi xatolik!', [
                'level' => 'error',
                'type' => 'HTTP',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Barcha darajadagi xatoliklar Telegramga yuborildi! Telegram botingizni tekshiring.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xatolik: ' . $e->getMessage()
            ], 500);
        }
    }
}
