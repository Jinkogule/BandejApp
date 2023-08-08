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
        'prato_principal',
        'fila',
        'comida',
        'data_refeicao_avaliada',
        'outro_topico',
        'outro_topico_comentario'
    ];
}
