<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Services\CampeonatoService;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    protected $service;

    public function __construct(CampeonatoService $service)
    {
        $this->service = $service;
    }

    public function simular(Request $request)
    {
        try {
            $campeonato = $this->service->simularCampeonato($request->input('nome'));
            return ApiResponse::success($campeonato, 'Campeonato simulado com sucesso!');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 400);
        }
    }

    public function index()
    {
        $campeonatos = $this->service->getAllCampeonatos();
        return ApiResponse::success($campeonatos, 'Lista de campeonatos recuperada com sucesso.');
    }

    public function show($id)
    {
        $campeonato = $this->service->getCampeonatoById($id);

        if (!$campeonato) {
            return ApiResponse::error('Campeonato não encontrado', 404);
        }

        return ApiResponse::success($campeonato, 'Detalhes do campeonato recuperados com sucesso.');
    }
}
