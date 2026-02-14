<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Usecases\Repositories\CategoryRepositoryInterface;


class Category implements CategoryRepositoryInterface
{
    public function fetchAll(): array
    {
        return DB::connection('mysql')->select("SELECT id, name, service_id as serviceId FROM category");
    }

    public function fetchByCustomerTypeId(int $customerTypeId): array
    {
        $customerType = strval($customerTypeId);
        return DB::connection('mysql')->select("
        SELECT c.id, c.name, c.service_id as serviceId FROM category c
        INNER JOIN service s ON c.service_id = s.id
        WHERE
        (? = 1 AND s.id IN (1, 2)) OR
        (? = 2 AND s.id IN (1, 2, 3, 4)) OR
        (? = 3 AND s.id IN (1, 2, 3, 4, 6, 7))
        ",
        [$customerType, $customerType, $customerType]);
    }
}
