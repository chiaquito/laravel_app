<?php

namespace App\Http\Controllers\Common;
use Illuminate\Http\JsonResponse;

class HttpResponse
{
    public static function toResponse($data = null, $status = 200): JsonResponse
    {
        return response()->json($data, $status, ['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }
}
