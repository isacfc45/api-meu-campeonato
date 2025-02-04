<?php

namespace App\Services;

use App\Repositories\CampeonatoRepository;
use Exception;

class CampeonatoService
{
    public function __construct(protected CampeonatoRepository $repository) {}

    public function simularCampeonato($nome)
    {
        $times = $this->repository->getTimes();

        if ($times->count() !== 8) {
            throw new Exception('É necessário exatamente 8 times para iniciar o campeonato.');
        }

        $campeonato = $this->repository->createCampeonato($nome);
        $fases = ['quartas', 'semifinal', 'final', '3º_lugar'];
        $classificados = $times->shuffle()->values();

        foreach ($fases as $fase) {
            $proximosClassificados = collect();

            for ($i = 0; $i < $classificados->count(); $i += 2) {
                $timeA = $classificados[$i];
                $timeB = $classificados[$i + 1];

                [$golsA, $golsB] = $this->executarScriptPython();
                $vencedor = $this->determinarVencedor($timeA, $timeB, $golsA, $golsB);

                $this->repository->criarPartida(
                    $campeonato->id,
                    $timeA->id,
                    $timeB->id,
                    $fase,
                    $golsA,
                    $golsB,
                    $vencedor->id
                );

                if ($fase !== '3º_lugar') {
                    $proximosClassificados->push($vencedor);
                }
            }

            $classificados = $proximosClassificados;
        }

        $campeonato->update(['data_fim' => now()]);
        return $campeonato->load('partidas');
    }

    private function executarScriptPython(): array
    {
        $output = [];
        exec('python3 app/Scripts/teste.py', $output);
        return [(int)$output[0], (int)$output[1]];
    }

    private function determinarVencedor($timeA, $timeB, $golsA, $golsB)
    {
        if ($golsA > $golsB) return $timeA;
        if ($golsB > $golsA) return $timeB;

        $pontosA = $timeA->pontos + ($golsA - $golsB);
        $pontosB = $timeB->pontos + ($golsB - $golsA);

        if ($pontosA !== $pontosB) {
            return $pontosA > $pontosB ? $timeA : $timeB;
        }

        return $timeA->data_inscricao < $timeB->data_inscricao ? $timeA : $timeB;
    }
}
