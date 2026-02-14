<?php

namespace App\Usecases\Repositories;

interface CategoryRepositoryInterface
{
    // Fetch all categories
    public function fetchAll(): array; // array of Category objects

}
