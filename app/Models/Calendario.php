<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia_da_semana',
        'data',
        'cardapio_id',
    ];

    /**
     * Get the cardapio associated with the calendario.
     */
    public function cardapio()
    {
        return $this->belongsTo(Cardapio::class);
    }
}
