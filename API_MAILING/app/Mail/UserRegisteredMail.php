<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\table_user;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct(table_user $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Réinitialisation de Mot de Passe')
                    ->view('emails.user_registered')
                    ->with([
                        'user_id' => $this->user->id,
                        'token' => $this->token,
                    ]);
    }
}
