<?php

namespace App\Usecases\Repositories;

interface CategoryRepositoryInterface
{
    // Fetch all categories
    public function fetchAll(): array; // array of Category objects

    // Fetch categories by customer type ID
    public function fetchByCustomerTypeId(int $customerTypeId): array; // array of Category objects

}
