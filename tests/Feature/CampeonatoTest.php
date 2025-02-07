<?php

namespace Tests\Feature;

use App\Models\Campeonato;
use Tests\TestCase;
use App\Models\Time;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampeonatoTest extends TestCase
{
    use RefreshDatabase;

    public function test_simulacao_de_campeonato()
    {
        Time::factory()->count(8)->create();

        $response = $this->postJson('/api/campeonatos/simular', [
            'nome' => 'Campeonato Teste'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'Campeonato simulado com sucesso!'
            ]);

        $this->assertDatabaseCount('partidas', 8);
    }

    public function test_nao_permitir_simulacao_com_menos_de_8_times()
    {
        Time::factory()->count(6)->create();

        $response = $this->postJson('/api/campeonatos/simular', [
            'nome' => 'Campeonato Inválido'
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    public function test_listar_campeonatos()
    {
        $response = $this->getJson('/api/campeonatos');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => ['id', 'nome', 'data_inicio', 'data_fim', 'partidas']
                ]
            ]);
    }

    public function test_exibir_detalhes_do_campeonato()
    {
        $campeonato = Campeonato::factory()->create();

        $response = $this->getJson("/api/campeonatos/{$campeonato->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => ['id', 'nome', 'data_inicio', 'data_fim', 'partidas']
            ]);
    }
}
