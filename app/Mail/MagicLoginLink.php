<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\URL;

class MagicLoginLink extends Mailable
{
    use Queueable, SerializesModels;

    public $plaintextToken;
  	public $expiresAt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plaintextToken, $expiresAt)
    {
        
    	$this->plaintextToken = $plaintextToken;
    	$this->expiresAt = $expiresAt;
  	}

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Magic Login Link',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    /**
     * Build email
     */
    public function build()
  	{
    	return $this->subject(
      		config('app.name') . ' Login Verification')
    			->markdown('emails.magic-login-link', 
    				['url' => URL::temporarySignedRoute('verify-login', $this->expiresAt, 
    					['token' => $this->plaintextToken])]);
  	}
}
