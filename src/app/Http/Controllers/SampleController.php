<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;

class SampleController
{
    public function sample(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'This is a sample controller method.'
        ]);
    }
}
