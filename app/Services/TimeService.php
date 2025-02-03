<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;

class TimeService
{
    public function __construct(protected TimeRepositoryInterface $repository) {}

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        $data['data_inscricao'] = now();
        return $this->repository->create($data);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
