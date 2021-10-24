<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $Application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Application)
    {
        $this->Application = $Application;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name',compact('Application'));
    }
}
