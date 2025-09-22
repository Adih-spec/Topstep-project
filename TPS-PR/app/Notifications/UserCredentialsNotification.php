<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserCredentialsNotification extends Notification
{
    use Queueable;

    public $name;
    public $email;
    public $password;
    public $role;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $email, $password, $role = 'User')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role; // e.g., Admin, Student
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Your {$this->role} Account Credentials")
            ->view('emails.students.credentials', [
                'name'     => $this->name,
                'email'    => $this->email,
                'password' => $this->password,
                'role'     => $this->role,
            ]); // 👈 semicolon was missing
    }
}
