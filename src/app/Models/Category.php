<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Usecases\Repositories\CategoryRepositoryInterface;


class Category implements CategoryRepositoryInterface
{
    public function fetchAll(): array
    {
        return DB::connection('mysql')->select('SELECT * FROM category');
    }
}
