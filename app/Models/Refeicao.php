<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'tipo',
        'cardapio',
        'unidade_bandejao',
        'data',
        'dia_da_semana',
        'status_confirmacao',
        'status_validez'
    ];
}
