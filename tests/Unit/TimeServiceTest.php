<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\TimeService;
use App\Repositories\Contracts\TimeRepositoryInterface;
use Mockery;

class TimeServiceTest extends TestCase
{
    public function test_criar_time_com_sucesso()
    {
        $mockRepository = Mockery::mock(TimeRepositoryInterface::class);
        $mockRepository->shouldReceive('create')
            ->once()
            ->andReturn(['id' => 1, 'nome' => 'Time Teste']);

        $service = new TimeService($mockRepository);
        $result = $service->create(['nome' => 'Time Teste']);

        $this->assertEquals('Time Teste', $result['nome']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
