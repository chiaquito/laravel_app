<?php

namespace Tests\Common;

class RandInt
{
    public static function id(): int
    {
        return random_int(1, 999999);
    }
}
