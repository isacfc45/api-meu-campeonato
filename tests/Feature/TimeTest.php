<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Time;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimeTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_novo_time()
    {
        $response = $this->postJson('/api/times', [
            'nome' => 'Time Teste'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'status' => 'success',
                'data' => ['nome' => 'Time Teste']
            ]);
    }

    public function test_listar_times()
    {
        Time::factory()->count(3)->create();

        $response = $this->getJson('/api/times');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => ['id', 'nome', 'data_inscricao', 'pontos']
                ]
            ]);
    }

    public function test_validacao_de_nome_duplicado()
    {
        Time::create(['nome' => 'Time Único']);

        $response = $this->postJson('/api/times', [
            'nome' => 'Time Único'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('nome');
    }

    public function test_atualizar_time()
    {
        $time = Time::factory()->create();

        $response = $this->putJson("/api/times/{$time->id}", [
            'nome' => 'Time Atualizado'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => ['nome' => 'Time Atualizado']
            ]);
    }

    public function test_deletar_time()
    {
        $time = Time::factory()->create();

        $response = $this->deleteJson("/api/times/{$time->id}");

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'Time deletado com sucesso'
            ]);
    }

    public function test_buscar_time_por_id()
    {
        $time = Time::factory()->create();

        $response = $this->getJson("/api/times/{$time->id}");

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => ['nome' => $time->nome]
            ]);
    }

    public function test_buscar_time_por_id_inexistente()
    {
        $response = $this->getJson('/api/times/1');

        $response->assertStatus(404)
            ->assertJson([
                'status' => 'error',
                'message' => 'Time não encontrado'
            ]);
    }
}
