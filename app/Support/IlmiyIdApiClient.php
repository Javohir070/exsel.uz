<?php

namespace App\Support;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * api-id.ilmiy.uz — Science ID bo‘yicha foydalanuvchi ma’lumotlari.
 * Kalitlar .env orqali (config/services.php → ilmiy_id).
 */
final class IlmiyIdApiClient
{
    public static function configured(): bool
    {
        return filled(config('services.ilmiy_id.username'))
            && filled(config('services.ilmiy_id.password'));
    }

    public static function userByScienceId(string $scienceId): ?Response
    {
        if (! self::configured()) {
            return null;
        }

        $base = rtrim((string) config('services.ilmiy_id.url', 'https://api-id.ilmiy.uz'), '/');
        $url = "{$base}/api/users/by-science-id/{$scienceId}/";

        return Http::withBasicAuth(
            (string) config('services.ilmiy_id.username'),
            (string) config('services.ilmiy_id.password')
        )
            ->withOptions([
                'verify' => (bool) config('services.ilmiy_id.verify_ssl', false),
            ])
            ->get($url);
    }
}
