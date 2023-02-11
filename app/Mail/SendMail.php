<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (isset($this->data['attachment'])) {
            return $this->from($this->data['email'])->subject($this->data['subject'])->attach($this->data['attachment']->getRealPath(),[
                'as' => $this->data['attachment']->getClientOriginalName(),
                'mime' => $this->data['attachment']->getClientMimeType(),
            ])->view('template')->with('data',$this->data);
        } else {
            return $this->from($this->data['email'])->subject($this->data['subject'])->view('template')->with('data',$this->data);
        }
        
      
    }
}
