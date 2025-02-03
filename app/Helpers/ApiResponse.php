<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data, $message = 'Operação realizada com sucesso', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function error($message = 'Erro na operação', $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
