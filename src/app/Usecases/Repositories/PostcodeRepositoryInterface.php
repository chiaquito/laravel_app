<?php

namespace App\Usecases\Repositories;

interface PostcodeRepositoryInterface
{
    // fetch address by postcode
    public function fetchOne(int $postcode): object|null; // Address object
}
