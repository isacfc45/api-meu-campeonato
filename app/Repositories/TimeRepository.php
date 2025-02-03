<?php

namespace App\Repositories;

use App\Models\Time;
use App\Repositories\Contracts\TimeRepositoryInterface;

class TimeRepository implements TimeRepositoryInterface
{
    public function all()
    {
        return Time::all();
    }

    public function find($id)
    {
        return Time::find($id);
    }

    public function create(array $data)
    {
        return Time::create($data);
    }

    public function update($id, array $data)
    {
        $time = $this->find($id);
        if ($time) {
            $time->update($data);
            return $time;
        }
        return null;
    }

    public function delete($id)
    {
        $time = $this->find($id);
        if ($time) {
            return $time->delete();
        }
        return false;
    }
}
