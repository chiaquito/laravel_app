<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Category
{
    public function find()
    {
        return DB::connection('mysql')->select('SELECT * FROM category');
    }
}
