<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DocumentViewedNotification extends Notification
{
    use Queueable;

    private $userName;
    private $documentName;

    public function __construct($userName, $documentName)
    {
        $this->userName = $userName;
        $this->documentName = $documentName;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Dokumen Dilihat')
                    ->greeting('Hello Admin,')
                    ->line('Departemen dengan nama user ' . $this->userName . ' sedang melihat dokumen: ' . $this->documentName)
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
