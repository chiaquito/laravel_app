<?php

namespace Tests\Common;

use Illuminate\Support\Str;

class RandStr
{
    public static function random(int $length = 10): string
    {
        return Str::random($length);
    }
}
