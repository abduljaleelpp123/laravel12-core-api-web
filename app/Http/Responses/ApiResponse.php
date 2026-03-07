<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    protected function ok($data = [], string $message = 'OK', int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    protected function fail(string $message, int $code = 400, $errors = null): JsonResponse
    {
        $payload = ['success' => false, 'message' => $message];
        if (!is_null($errors)) $payload['errors'] = $errors;

        return response()->json($payload, $code);
    }
}
