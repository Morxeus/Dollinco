<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReunionNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reunion; // Detalles de la reunión

    /**
     * Create a new message instance.
     */
    public function __construct($reunion)
    {
        $this->reunion = $reunion;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Notificación de Reunión')
                    ->view('emails.reunion-notification');
    }
}
