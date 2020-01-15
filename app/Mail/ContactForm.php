<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $mail;

    /**
     * Create a new message instance.
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->mail = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM'))
            ->to(env('MAIL_TO'))
            ->subject('Proncar | '. $this->mail['subject'] .' from ' . $this->mail['name'] . ' | ' . Carbon::now()->format('d/m/Y H:i:s'))
            ->view('mail.contact')->with([
                'email' => $this->mail['email'],
                'phone' => $this->mail['phone'],
                'name' => $this->mail['name'],
                'subject' => $this->mail['subject'],
                'body' => $this->mail['message'],
            ]);
    }
}
