<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Faqat ko'rish uchun mo'ljallangan rollar (masalan, "Rahbar") ma'lumotlarni
 * qo'shish, tahrirlash, o'chirish yoki import qilish imkoniga ega bo'lmasligi kerak.
 */
class ReadOnlyRole
{
    public const ROLES = ['Rahbar'];

    // Faqat ko'ruvchi foydalanuvchilarga ham ruxsat berilgan yozish amallari (o'z akkaunti bilan bog'liq)
    protected array $allowedRoutes = [
        'logout',
        'password.change',
        'password.update',
        'profile.update',
    ];

    // Ma'lumotni o'zgartiradigan yoki tahrirlash sahifasini ochadigan GET yo'llari
    protected array $blockedGetRoutes = [
        'php_import',
        'ilmiy_rahbarlar_import',
        'akadem_sync',
        'ilmiyrahbarlar.updateBYBirth_date',
        'ilmiy_loyha_user_edit.index',
        'tashqoshish.create',
        'tashkilot.users.create',
        'tashkilot.users.edit',
    ];

    protected array $blockedGetPaths = [
        'reformat-phones',
        'roles/*/delete',
        'roles/*/give-permissions',
        'permissions/*/delete',
        'users/*/delete',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->isReadOnlyUser($request) || ! $this->isWriteRequest($request)) {
            return $next($request);
        }

        $message = "Sizning rolingiz faqat ma'lumotlarni ko'rish uchun mo'ljallangan.";

        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 403);
        }

        abort(403, $message);
    }

    public static function userIsReadOnly($user): bool
    {
        if (! $user) {
            return false;
        }

        // Foydalanuvchida boshqa (tahrirlash huquqli) rol bo'lsa, cheklov qo'llanmaydi
        return $user->hasAnyRole(self::ROLES)
            && $user->roles->pluck('name')->diff(self::ROLES)->isEmpty();
    }

    protected function isReadOnlyUser(Request $request): bool
    {
        return self::userIsReadOnly($request->user());
    }

    protected function isWriteRequest(Request $request): bool
    {
        $routeName = $request->route()?->getName();

        if ($routeName && in_array($routeName, $this->allowedRoutes, true)) {
            return false;
        }

        if (! $request->isMethodSafe()) {
            return true;
        }

        if ($routeName && (str_ends_with($routeName, '.create') || str_ends_with($routeName, '.edit'))) {
            return true;
        }

        if ($routeName && in_array($routeName, $this->blockedGetRoutes, true)) {
            return true;
        }

        return $request->is(...$this->blockedGetPaths);
    }
}
