<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Refeicao;

class NotificaConfirmacaoDePresenca extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\User
     * @var \App\Models\Refeicao
     */
    public $user;
    public $refeicao;
 
    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $order
     * @param  \App\Models\Refeicao  $order
     * @return void
     */
    public function __construct($user, $refeicao)
    {
        $this->user = $user;
        $this->refeicao = $refeicao;
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
                        'email' => $this->user->email,
                        'tipo_refeicao' => $this->refeicao->tipo,
                        'unidade_refeicao' => $this->refeicao->unidade_bandejao,
                        'data_refeicao' => $this->refeicao->data_visual,
                        'dia_da_semana_refeicao' => $this->refeicao->dia_da_semana,
                    ]);
    }
}

