<?php

namespace App\Http\Controllers;

class SampleController
{
    public function sample(): string
    {
        return response()->json(
            'This is a sample controller method.');
        // return 'This is a sample controller method.';
    }
}
