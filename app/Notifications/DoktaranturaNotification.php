<?php

namespace App\Notifications;

use App\Models\Doktaranturaexpert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DoktaranturaNotification extends Notification
{
    use Queueable;
    protected $doktaranturaexpert;
    /**
     * Create a new notification instance.
     */
    public function __construct(Doktaranturaexpert $doktaranturaexpert)
    {
        $this->doktaranturaexpert = $doktaranturaexpert;
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
            'id' => $this->doktaranturaexpert->id,
            'name' => $this->doktaranturaexpert->tashkilot->name,
            'tashkilot_id' => $this->doktaranturaexpert->tashkilot_id,
            'fish' => $this->doktaranturaexpert->fish,
        ];
    }
}
