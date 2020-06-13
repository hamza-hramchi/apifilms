<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@exemple.com', 'Mailtrap')
            ->subject('Mailtrap confirmation')
            ->markdown('mails.exemple')
            ->with([
                'name' => 'New Mailtrap user',
                'link' => 'https://mailtrap.io/inboxes'
            ]);
    }
}
