<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'refeicoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'tipo',
        'unidade_bandejao',
        'data',
        'dia_da_semana',
        'status_confirmacao',
        'status_validez',
        'avaliacao',
        'avaliacao_detalhada',
        'cardapio_id'
    ];

    public function cardapio()
    {
        return $this->belongsTo(Cardapio::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($refeicao) {
            $cardapio = Cardapio::where('data', $refeicao->data)->first();
            if ($cardapio) {
                $refeicao->cardapio()->associate($cardapio);
                $refeicao->save();
            }
        });
    }
}
