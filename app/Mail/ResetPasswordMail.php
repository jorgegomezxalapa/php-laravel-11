<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resetLink;

    public function __construct($user, $resetLink)
    {
        $this->user = $user;
        $this->resetLink = $resetLink;
    }

    public function build()
    {
        return $this->subject('Actualiza tu contraseña')
                    ->view('emails.reset-password')
                    ->with([
                        'name' => $this->user->name,
                        'resetLink' => $this->resetLink
                    ]);
    }
}