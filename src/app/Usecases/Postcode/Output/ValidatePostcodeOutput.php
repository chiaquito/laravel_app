<?php

namespace App\Usecases\Postcode\Output;

class ValidatePostcodeOutput
{
    public string $result;

    private function __construct(string $result)
    {
        $this->result = $result;
    }

    public static function toOutput(object|null $res): object
    {
        if ($res === null) {
            return new ValidatePostcodeOutput("invalid");
        }
        return new ValidatePostcodeOutput("valid");
    }
}
