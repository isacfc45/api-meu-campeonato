<?php

namespace Tests\Feature;

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
                'message' => 'É necessário exatamente 8 times para iniciar o campeonato.'
            ]);
    }
}
