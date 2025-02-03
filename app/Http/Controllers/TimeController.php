<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreTimeRequest;
use App\Http\Requests\UpdateTimeRequest;
use App\Http\Resources\TimeResource;
use App\Services\TimeService;

class TimeController extends Controller
{
    public function __construct(protected TimeService $service) {}

    public function index()
    {
        $times = $this->service->getAll();
        return ApiResponse::success(TimeResource::collection($times));
    }

    public function store(StoreTimeRequest $request)
    {
        $time = $this->service->create($request->validated());
        return ApiResponse::success(new TimeResource($time), 'Time criado com sucesso', 201);
    }

    public function show($id)
    {
        $time = $this->service->find($id);
        return $time
            ? ApiResponse::success(new TimeResource($time))
            : ApiResponse::error('Time não encontrado', 404);
    }

    public function update(UpdateTimeRequest $request, $id)
    {
        $time = $this->service->update($id, $request->validated());
        return $time
            ? ApiResponse::success(new TimeResource($time), 'Time atualizado com sucesso')
            : ApiResponse::error('Time não encontrado', 404);
    }

    public function destroy($id)
    {
        return $this->service->delete($id)
            ? ApiResponse::success(null, 'Time deletado com sucesso')
            : ApiResponse::error('Time não encontrado', 404);
    }
}
