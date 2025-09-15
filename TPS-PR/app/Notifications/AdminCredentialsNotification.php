<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminCredentialsNotification extends Notification
{
    use Queueable;

    public $name;
    public $email;
    public $password;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Admin Account Credentials')
            ->greeting("Hello {$this->name},")
            ->line('Your admin account has been created successfully.')
            ->line("**Email:** {$this->email}")
            ->line("**Password:** {$this->password}")
            ->line('Please log in and change your password immediately for security.')
            ->salutation('Regards, School Management System');
    }
}