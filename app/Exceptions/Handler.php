<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that should not be reported to Telegram.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Faqat muhim xatoliklarni Telegramga yuborish
            // ValidationException va 404 xatoliklari yuborilmaydi
            if ($this->shouldReportToTelegram($e)) {
                $this->logToTelegram($e);
            }
        });
    }

    /**
     * Xatolikni Telegramga yuborish kerakligini aniqlash
     */
    protected function shouldReportToTelegram(Throwable $e): bool
    {
        // ValidationException va NotFoundHttpException yuborilmaydi
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            return false;
        }

        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return false; // 404 xatoliklari yuborilmaydi
        }

        if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            // 400-499 xatoliklari (client errors) yuborilmaydi, faqat 500+ (server errors)
            if ($e->getStatusCode() < 500) {
                return false;
            }
        }

        // Boshqa barcha xatoliklar yuboriladi
        return true;
    }

    /**
     * Xatoliklarni Telegramga yuborish
     */
    protected function logToTelegram(Throwable $e): void
    {
        try {
            $context = [
                'exception' => $e,
            ];

            // Request ma'lumotlarini qo'shish
            if (app()->runningInConsole()) {
                $context['type'] = 'Console';
                $context['command'] = request()->server('argv', []);
            } else {
                $context['type'] = 'HTTP';
                $context['url'] = request()->fullUrl();
                $context['method'] = request()->method();
                $context['ip'] = request()->ip();
                $context['user_agent'] = request()->userAgent();
                
                // Foydalanuvchi ma'lumotlari
                if (auth()->check()) {
                    $context['user_id'] = auth()->id();
                    $context['user_name'] = auth()->user()->name ?? 'Noma\'lum';
                }
                
                // Request parametrlari (parol va shunga o'xshashlar bundan mustasno)
                $context['request_data'] = request()->except(['password', 'password_confirmation', 'current_password', '_token']);
            }

            Log::channel('telegram')->error($e->getMessage(), $context);
        } catch (\Exception $exception) {
            // Telegramga yuborishda xatolik bo'lsa, oddiy logga yozish
            Log::error('Telegramga xatolik yuborishda muammo: ' . $exception->getMessage());
        }
    }
}
