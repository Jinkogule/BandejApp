<?php

namespace App\Providers;

use App\Models\Cardapio;
use App\Observers\CardapioObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Cardapio::observe(CardapioObserver::class);
    }
}
