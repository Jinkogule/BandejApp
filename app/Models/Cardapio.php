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

    /**
     * The refeicoes that belong to the cardapio.
     */
    public function refeicoes()
    {
        return $this->belongsToMany(Refeicao::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($cardapio) {
            $refeicoes = Refeicao::where('data', $cardapio->data)->get();
            foreach ($refeicoes as $refeicao) {
                $cardapio->refeicoes()->attach($refeicao);
            }
        });
    }
}
