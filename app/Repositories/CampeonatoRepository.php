<?php

namespace App\Repositories;

use App\Models\Campeonato;
use App\Models\Partida;
use App\Models\Time;

class CampeonatoRepository
{
    public function createCampeonato($nome)
    {
        return Campeonato::create(['nome' => $nome, 'data_inicio' => now()]);
    }

    public function criarPartida($campeonatoId, $timeCasaId, $timeForaId, $fase, $golsCasa, $golsFora, $vencedorId)
    {
        return Partida::create([
            'campeonato_id' => $campeonatoId,
            'time_casa_id' => $timeCasaId,
            'time_fora_id' => $timeForaId,
            'gols_casa' => $golsCasa,
            'gols_fora' => $golsFora,
            'fase' => $fase,
            'vencedor_id' => $vencedorId
        ]);
    }

    public function getTimes()
    {
        return Time::all();
    }
}
