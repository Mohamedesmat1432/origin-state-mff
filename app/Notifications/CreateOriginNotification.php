<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateOriginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $origin, $sender;

    /**
     * Create a new notification instance.
     */
    public function __construct($origin, $sender)
    {
        $this->origin = $origin;
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Origin Created')
            ->markdown('emails.origin.created', [
                'origin' => $this->origin,
                'sender' => $this->sender,
                'recipient' => $notifiable
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable)
    {
        return [
            'origin_id' => $this->origin->id,
            'origin_name' => $this->origin->project->name,
            'sender_name' => $this->sender->name,
            'message' => "**{$this->origin->id}** " . __('site.new_origin_has_been_created_by') . " {$this->sender->name}."
        ];
    }
}
