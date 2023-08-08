<?php

namespace App\Observers;

use App\Models\Cardapio;

class CardapioObserver
{
    /**
     * Handle the Cardapio "created" event.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return void
     */
    public function created(Cardapio $cardapio)
    {
        $data = $cardapio->data;
        $refeicoes = Refeicao::where('data', $data)->get();
        foreach ($refeicoes as $refeicao) {
            $refeicao->cardapios()->attach($cardapio);
        }
    }

    /**
     * Handle the Cardapio "updated" event.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return void
     */
    public function updated(Cardapio $cardapio)
    {
        //
    }

    /**
     * Handle the Cardapio "deleted" event.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return void
     */
    public function deleted(Cardapio $cardapio)
    {
        //
    }

    /**
     * Handle the Cardapio "restored" event.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return void
     */
    public function restored(Cardapio $cardapio)
    {
        //
    }

    /**
     * Handle the Cardapio "force deleted" event.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return void
     */
    public function forceDeleted(Cardapio $cardapio)
    {
        //
    }
}
