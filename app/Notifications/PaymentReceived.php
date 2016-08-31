<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentReceived extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $url = url('/');
        return (new \Illuminate\Notifications\Messages\SlackMessage)
                    ->success()
                    ->content('One of your invoices has been paid!')
                    ->attachment(function ($attachment) use ($url) {
                        $attachment->title('Invoice 1322', $url)
                                   ->fields([
                                        'Title'       => 'Server Expenses',
                                        'Amount'      => '$1,234',
                                        'Via'         => 'American Express',
                                        'Was Overdue' => ':-1:',
                                    ]);
                    });

        // return (new \Illuminate\Notifications\Messages\SlackMessage)
        //         ->success()
        //         ->content('A new payment was just processed!');

    }
}
