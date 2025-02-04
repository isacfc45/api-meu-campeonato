<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $fillable = ['campeonato_id', 'time_casa_id', 'time_fora_id', 'gols_casa', 'gols_fora', 'fase'];

    protected $casts = [
        'data_partida' => 'datetime',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }
}
