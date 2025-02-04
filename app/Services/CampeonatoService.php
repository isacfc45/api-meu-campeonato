<?php

namespace App\Services;

use App\Repositories\CampeonatoRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class CampeonatoService
{
    public function __construct(protected CampeonatoRepository $repository) {}

    public function simularCampeonato($nome)
    {
        try {
            DB::beginTransaction();

            $times = $this->repository->getTimes();

            if ($times->count() !== 8) {
                throw new \Exception('É necessário exatamente 8 times para iniciar o campeonato.');
            }

            $campeonato = $this->repository->createCampeonato($nome);
            $classificados = $times->shuffle()->values();

            $semifinalistas = $this->simularFase($campeonato->id, $classificados, 'quartas');

            $finalistas = $this->simularFase($campeonato->id, $semifinalistas, 'semifinal');

            $perdedoresSemifinal = $semifinalistas->diff($finalistas)->values();
            $this->simularFase($campeonato->id, $perdedoresSemifinal, '3º_lugar');

            $this->simularFase($campeonato->id, $finalistas, 'final');

            $campeonato->update(['data_fim' => now()]);

            DB::commit();

            return $campeonato->load('partidas');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function simularFase($campeonatoId, $times, $fase)
    {
        $classificados = collect();

        for ($i = 0; $i < $times->count(); $i += 2) {
            $timeA = $times[$i];
            $timeB = $times[$i + 1];

            [$golsA, $golsB] = $this->executarScriptPython();
            $vencedor = $this->determinarVencedor($timeA, $timeB, $golsA, $golsB);

            $this->repository->criarPartida(
                $campeonatoId,
                $timeA->id,
                $timeB->id,
                $fase,
                $golsA,
                $golsB,
                $vencedor->id
            );

            if (in_array($fase, ['quartas', 'semifinal'])) {
                $classificados->push($vencedor);
            }
        }

        return $classificados;
    }


    private function executarScriptPython(): array
    {
        $output = [];
        exec('python3 ' . base_path('app/Scripts/teste.py'), $output);
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

    public function getAllCampeonatos()
    {
        return $this->repository->getAllCampeonatos();
    }

    public function getCampeonatoById($id)
    {
        return $this->repository->getCampeonatoById($id);
    }
}
