<?php

namespace App\Usecases\Postcode\Output;

class AddressByPostcodeOutput
{
    public int $postcode;
    public string $address1;
    public string $address2;
    public string $address3;

    private function __construct(int $postcode, string $address1, string $address2, string $address3)
    {
        $this->postcode = $postcode;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
    }

    public static function toOutput(object|null $res): object
    {
        if ($res === null) {
            throw new \InvalidArgumentException("Postcode not found");
        }
        return new AddressByPostcodeOutput($res->zipcode, $res->address1, $res->address2, $res->address3);
    }
}
