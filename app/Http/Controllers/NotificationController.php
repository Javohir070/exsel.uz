<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function index()
    {
        // Foydalanuvchiga tegishli barcha bildirishnomalarni olish
        $notifications = DatabaseNotification::where('notifiable_id', auth()->id())->orderByDesc('created_at')->paginate(20);

        return view('admin.notifications.notifications', ['notifications' => $notifications]);
    }
    public function show($notification)
    {

        // Bildirishnomani olish
        $notificationId = DatabaseNotification::find($notification);

        if ($notificationId) {
            // Bildirishnoma bo'yicha barcha foydalanuvchilarni olish

            // Barcha foydalanuvchilarni o'qilgan deb belgilash
            DatabaseNotification::where('id', $notification)
                ->update(['read_at' => now()]);
        }

        if (!empty($notificationId->data['asbobuskuna_id'])) {
            return redirect()->route('asbobuskuna.show', $notificationId->data['asbobuskuna_id']);
        } elseif (!empty($notificationId->data['stajirovka_id'])) {
            return redirect()->route('stajirovka.show', $notificationId->data['stajirovka_id']);
        }elseif (!empty($notificationId->data['tashkilot_id'])) {
            return redirect()->route('doktarantura.show', $notificationId->data['tashkilot_id']);
        }elseif (!empty($notificationId->data['ilmiy_loyiha_id'])) {
            return redirect()->route('ilmiyloyiha.show', $notificationId->data['ilmiy_loyiha_id']);
        } else {
            return redirect()->route('reasondelay.index');
        }

    }

    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        $user->markAllNotificationsAsRead();

        return redirect()->route('notifications.index')->with('status', 'Barcha xabarnomalar o\'qilgan deb belgilandi.');
    }


}
