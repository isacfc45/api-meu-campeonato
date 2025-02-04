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
}
