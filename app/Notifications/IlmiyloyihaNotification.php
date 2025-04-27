<?php

namespace App\Notifications;

use App\Models\Tekshirivchilar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IlmiyloyihaNotification extends Notification
{
    use Queueable;
    protected $tekshirivchilar;
    /**
     * Create a new notification instance.
     */
    public function __construct(Tekshirivchilar $tekshirivchilar)
    {
        $this->tekshirivchilar = $tekshirivchilar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->tekshirivchilar->id,
            'name' => $this->tekshirivchilar->ilmiyLoyihalar->mavzusi,
            'ilmiy_loyiha_id' => $this->tekshirivchilar->ilmiy_loyiha_id,
            'fish' => $this->tekshirivchilar->fish,
        ];
    }
}
