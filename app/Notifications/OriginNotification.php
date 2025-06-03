<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OriginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $origin, $sender, $action, $action_by;

    /**
     * Create a new notification instance.
     */
    public function __construct($origin, $sender, $action, $action_by)
    {
        $this->origin = $origin;
        $this->sender = $sender;
        $this->action = $action ?? __('site.create_origin');
        $this->action_by = $action_by ?? __('site.origin_created');
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
            ->subject($this->action)
            ->markdown('emails.origin.notification', [
                'origin' => $this->origin,
                'sender' => $this->sender,
                'recipient' => $notifiable,
                'action' => $this->action,
                'action_by' => $this->action_by,
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
            'message' => "**{$this->origin->id}** " .  $this->action_by . " {$this->sender->name}."
        ];
    }
}
