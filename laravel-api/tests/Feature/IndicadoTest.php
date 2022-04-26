<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Enums\StatusIndicacao;
use App\Models\Indicado;

class IndicadoTest extends TestCase
{
    public function testStoreIndicado()
    {
        $payload = [
            'nome' => 'Matheus',
            'cpf' => '67924314431',
            'telefone' => '33333232',
            'email' => 'mail@email',
        ];

        $response = $this->postJson('/api/indicado', json_encode($payload));
        $response->assertStatus(201);

        $this->assertDatabaseHas('indicados', $payload);
        $this->assertEquals(StatusIndicacao::Iniciada, $response->getData()->status_indicacao);
    }

    public function testUpdateIndicado()
    {
        $indicado = Indicado::factory()->make();

        $headers = [
            'Access-Control-Allow-Methods' => 'HEAD, GET, POST, PUT, PATCH, DELETE',
            'Access-Control-Allow-Headers' => 'Access-Control-Request-Headers',
            'Access-Control-Allow-Origin' => '*'
        ];

        $payload = [
            'nome' => 'Débora',
        ];

        $response = $this->json('PUT', '/api/indicado/' . $indicado->id, $payload, $headers);

        $response->assertStatus(200);

        $this->assertDatabaseHas('indicados', [
            'id' => $indicado->id,
            ...$payload
        ]);
    }


    public function testeEvoluirIndicacao()
    {

        $indicado = Indicado::factory()->make();

        $payload = [
            'status_indicacao' => 2
        ];

        $response = $this->patchJson('/api/indicado/' . $indicado->id, $payload);


        $response->assertStatus(200);

        $this->assertDatabaseHas('indicados', [
            'id' => $indicado->id,
            ...$payload
        ]);
    }

    public function testsDestroyIndicado()
    {
        $indicado = Indicado::factory()->make();

        $this->deleteJson('/api/indicado/' . $indicado->id)
            ->assertStatus(204);
    }

    public function testeExibicaoIndicados()
    {
        $indicado_1 = [
            'nome' => 'Matheus',
            'cpf' => '67924314431',
            'telefone' => '33333232',
            'email' => 'mail@email',
            'status_indicacao' => 1
        ];

        $indicado_2 = [
            'nome' => 'Débora',
            'cpf' => '64744021301',
            'telefone' => '33333232',
            'email' => 'mail@email',
            'status_indicacao' => 1
        ];

        $indicado = Indicado::factory()->make($indicado_1);
        $indicado = Indicado::factory()->make($indicado_2);

        $response = $this->getJson('/api/indicados')
            ->assertStatus(200)
            ->assertJson([
                $indicado_1,
                $indicado_2
            ])
            ->assertJsonStructure([
                '*' => ['id', 'nome', 'cpf', 'telefone', 'email', 'status_indicacao'],
            ]);
    }

}
