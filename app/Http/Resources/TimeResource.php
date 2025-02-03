<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'data_inscricao' => $this->data_inscricao->format('Y-m-d H:i:s'),
            'pontos' => $this->pontos,
        ];
    }
}
