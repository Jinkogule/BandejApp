<?php

namespace App\Observers;

use App\Events\NewNotification;
use App\Models\Aviso;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AvisoObserver
{
    /**
     * Handle the Aviso "created" event.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return void
     */
    public function created(Aviso $aviso)
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('user_notifications')->insert([
                'user_id' => $user->id,
                'aviso_id' => $aviso->id,
                'read' => false,
            ]);
        }

        event(new NewNotification($aviso));
    }


    /**
     * Handle the Aviso "updated" event.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return void
     */
    public function updated(Aviso $aviso)
    {
        //
    }

    /**
     * Handle the Aviso "deleted" event.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return void
     */
    public function deleted(Aviso $aviso)
    {
        //
    }

    /**
     * Handle the Aviso "restored" event.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return void
     */
    public function restored(Aviso $aviso)
    {
        //
    }

    /**
     * Handle the Aviso "force deleted" event.
     *
     * @param  \App\Models\Aviso  $aviso
     * @return void
     */
    public function forceDeleted(Aviso $aviso)
    {
        //
    }
}
