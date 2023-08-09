<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cardapios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data',
        'prato_principal',
        'guarnicao',
        'acompanhamentos',
        'sobremesa',
        'salada_1',
        'salada_2',
        'refresco'
    ];

    public function refeicoes()
    {
        return $this->hasMany(Refeicao::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($cardapio) {
            // Atualizar refeições com a mesma data
            $refeicoes = Refeicao::where('data', $cardapio->data)->get();
            foreach ($refeicoes as $refeicao) {
                $refeicao->cardapio()->associate($cardapio);
                $refeicao->save();
            }

            // Atualizar calendario com a mesma data
            $calendario = Calendario::where('data', $cardapio->data)->first();
            if ($calendario) {
                $calendario->cardapio()->associate($cardapio);
                $calendario->save();
            }
        });
    }
}
