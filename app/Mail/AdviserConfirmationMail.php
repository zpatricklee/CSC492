<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdviserConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $entry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($entry)
    {
        //
        $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
        return $this->from('onlineadvising@csudh.edu', 'CSUDH Online Advising')
                    ->subject('[CSUDH Online Advising] Please verify your email address')
                    ->view('emails.adviserConfirmation');
        */
        
        return $this->subject('[CSUDH Online Advising] Please verify your email address')
                    ->view('emails.adviserConfirmation');
    }
}
