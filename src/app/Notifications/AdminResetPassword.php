<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AdminResetPassword extends Notification
{
    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url("/admin/reset-password/{$this->token}?email={$this->email}");

        return (new MailMessage)
            ->subject('Admin Password Reset Request')
            ->line('Click the button below to reset your password.')
            ->action('Reset Password', $url)
            ->line('This link will expire soon.');
    }
}