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
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
                        'sobrenome' => $this->order->sobrenome,
                    ]);
    }
}
