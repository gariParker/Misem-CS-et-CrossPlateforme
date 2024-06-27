<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\table_user; // Assurez-vous que le modèle est correctement importé

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Propriété publique pour stocker les données utilisateur

    /**
     * Create a new message instance.
     *
     * @param table_user $user L'utilisateur à accueillir
     */
    public function __construct(table_user $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->user) {
            \Log::info('User object in WelcomeMail:', ['user' => $this->user]);
        } else {
            \Log::error('User object is null in WelcomeMail');
        }
    
        return $this->view('mailWelcome')
                    ->with(['user' => $this->user]);
    }
}
