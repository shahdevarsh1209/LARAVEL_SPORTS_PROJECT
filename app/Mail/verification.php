<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verfication extends Mailable
{
    use Queueable, SerializesModels;
    private $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->details=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return view('emails.verification')->with('data',$this->details);
    }
}
