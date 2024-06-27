<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\table_user;

class UserRegistered extends Notification
{
    use Queueable;

    private $user;

    public function __construct(table_user $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Welcome to Our Application')
                    ->line('Welcome ' . $this->user->name_user . '!')
                    ->line('Thank you for registering at our website.')
                    ->line('Enjoy our services!')
                    ->line('Thank you for using our application!');
    }
}
