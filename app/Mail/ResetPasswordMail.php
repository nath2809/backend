<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $user;
    public $resetUrl;


    public function __construct($token,$user,$resetUrl){
        $this->token = $token;
        $this->user = $user;
        $this->resetUrl = $resetUrl;
    }

    public function build()
    {
        return $this->subject('Recuperación de Contraseña')
            ->html('<h1>Contenido HTML del correo electrónico</h1>
                    <p>CONTENIDO HTML</p>
                    <a href="' . $this->resetUrl . '">Restablecer contraseña</a>
                   ')
            ->with([
                'resetUrl' => $this->resetUrl,
                'user' => $this->user,
                'token' => $this->token,
            ]);
    }
    
    
}
