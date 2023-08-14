<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'avaliacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'atendimento_nota',
        'atendimento_comentario',
        'ambiente_nota',
        'ambiente_comentario',
        'cardapios_nota',
        'cardapios_comentario',
        'fila_nota',
        'fila_comentario',
        'comida_nota',
        'comida_comentario',
        'outro_topico_nota',
        'outro_topico_comentario'
    ];
}
