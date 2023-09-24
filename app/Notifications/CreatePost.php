<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatePost extends Notification
{
    use Queueable;

    private
        $post_id,
        $post_title,
        $createdByUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post_id, $post_title, $createdByUser)
    {
        $this->post_id = $post_id;
        $this->post_title = $post_title;
        $this->createdByUser = $createdByUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'post_id' => $this->post_id,
            'post_title' => $this->post_title,
            'createdByUser' => $this->createdByUser,
        ];
    }
}
