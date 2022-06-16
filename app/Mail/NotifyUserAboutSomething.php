<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NotifyUserAboutSomething extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\User
     */
    public $user;
 
    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $order
     * @return void
     */
    public function __construct($user)
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
        return $this->from('bandejaoaplicativo@gmail.com', 'BandejApp')
                    ->subject('Confirme sua presença no Bandejão')
                    ->view('mail.confirmar-presenca')
                    ->with([
                        'nome' => $this->user->nome,
                        'sobrenome' => $this->user->sobrenome,
                    ]);
    }
}
