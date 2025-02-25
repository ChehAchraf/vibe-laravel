<?php


use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset the password')
            ->line('Click on the button to reset ur password : ')
            ->action('Reset the password', url(route('password.reset', $this->token, false)))
            ->line('if u dont ask for this, no need to take any action 😁);
    }
}
